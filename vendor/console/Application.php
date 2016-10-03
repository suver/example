<?php
/**
 * Клас запуска консольного приложенияприложения
 *
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */

namespace vendor\console;

require_once __DIR__ . '/../launcher/Application.php';

use vendor\console\Logger;

/**
 * Class Applicaton
 * @package console
 *
 * Запуск консольного приложения
 */
class Applicaton extends \vendor\launcher\Applicaton {

    protected $_params = null;

    protected $coreCommands = [
        'Migrate' => 'vendor/commands/Migrate',
        'Version' => 'vendor/commands/Version',
        'Colorize' => 'vendor/commands/Colorize',
    ];

    /**
     * Инициализатор
     * Определяет базовые параметры
     */
    public function init() {
        parent::init();
    }

    /**
     * Собственно ланчер. Реализация патерна commands
     *
     * @return bool
     */
    public function run() {
        if(parent::run()) {
            Logger::bootstrap('Application started')->show();

            $param = $this->resolve();
            $command = $param[0];
            $options = $param[1];

            if ($command) {
                $this->runCommand($command, $options);
            }

            return true;
        }
    }

    /**
     * Получем список параметров переданных из коммандной строки
     *
     * @return array|null
     */
    public function getParams() {
        if ($this->_params === null) {
            if (isset($_SERVER['argv'])) {
                $this->_params = $_SERVER['argv'];
                array_shift($this->_params);
            }
            else {
                $this->_params = [];
            }
        }

        return $this->_params;
    }

    /**
     * Устанавливаем первостепенный список параметров из коммандной строки
     *
     * @param $params
     */
    public function setParams($params) {
        $this->_params = $params;
    }

    /**
     * Разбираем комманды и получаем роуты для них и входящие параметры
     *
     * @return array
     */
    public function resolve() {
        $rawParams = $this->getParams();
        if (isset($rawParams[0])) {
            $pos = strpos($rawParams[0], ',');
            if ($pos) {
                $route = explode(',', $rawParams[0]);
            }
            else {
                $route = $rawParams[0];
            }
            array_shift($rawParams);
        }
        else {
            $route = '';
        }

        $params = [];
        foreach ($rawParams as $param) {
            if (preg_match('/^--(\w+)(?:=(.*))?$/', $param, $matches)) {
                $name = $matches[1];
                $params[$name] = isset($matches[2]) ? $matches[2] : true;
            }
            else if (preg_match('/^-(\w+)(?:=(.*))?$/', $param, $matches)) {
                $name = $matches[1];
                $params['_aliases'][$name] = isset($matches[2]) ? $matches[2] : true;
            }
            else {
                $params[] = $param;
            }
        }

        return [$route, $params];
    }

    /**
     * Обощенный стартер выполнения команд
     *
     * @param $command
     * @param array $options
     */
    protected function runCommand ($command, $options=[]) {
        if (is_array ($command)) {
            $this->_runCommands ($command, $options);
        }
        else {
            $this->_runCommand ($command, $options);
        }
    }

    /**
     * Запускаем еденичную команду
     * @param $command
     * @param $options
     * @throws \Exception
     */
    protected function _runCommand ($command, $options) {
        if (is_string ($command)) {
            if ($this->hasCommand ($command)) {

                List($class, $action) = $this->getClassAcctionFromCommand($command);

                if(isset($this->coreCommands[$class])) {
                    $path = Applicaton::getAlias("@" . $this->coreCommands[$class] . ".php");
                    $class = '\\' . str_replace('/', '\\', $this->coreCommands[$class]);
                }
                else {
                    $path = Applicaton::getAlias("@commands/{$class}.php");
                    $class = '\commands\\' . $class;
                }

                require_once $path;
                $object = new $class;
                $object->$action($options);
            }
            else {
                throw new \Exception("Command not found");
            }
        }
        else {
            throw new \Exception("Parametrs \$command must be a string");
        }
    }

    /**
     * запускаем набор команд
     *
     * @param $commands
     * @param $options
     * @throws \Exception
     */
    protected function _runCommands ($commands, $options) {
        if (is_array ($commands)) {
            foreach ($commands as $command) {
                $this->_runCommand($command, $options);
            }
        }
        else {
            throw new \Exception("Parametrs \$commands must be an arary");
        }
    }

    protected function getClassAcctionFromCommand($command) {
        $pos = strpos($command, '/');
        if ($pos) {
            $params = explode('/', $command);
            $class = ucfirst($params[0]);
            $action = $params[1];
        }
        else {
            $class = ucfirst($command);
            $action = 'execute';
        }

        return [$class, $action];
    }

    /**
     * Проверяем наличие консольной команды
     *
     * @param $command
     * @return bool
     */
    protected function hasCommand ($command) {

        List($class, $action) = $this->getClassAcctionFromCommand($command);

        if(isset($this->coreCommands[$class])) {
            $path = Applicaton::getAlias("@" . $this->coreCommands[$class] . ".php");
            $class = '\\' . str_replace('/', '\\', $this->coreCommands[$class]);
        }
        else {
            $path = Applicaton::getAlias("@commands/{$class}.php");
            $class = '\commands\\' . $class;
        }

        if(file_exists ($path)) {
            require_once $path;
            $object = new $class;
            return method_exists($object, $action);
        }
        return false;
    }

}