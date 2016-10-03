<?php
/**
 * Клас запуска приложения
 *
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */

namespace vendor\web;


require_once  __DIR__ . '/../launcher/Application.php';

/**
 * Class Applicaton
 * @package web
 *
 * Запуск вэб приложения
 */
class Applicaton extends \vendor\launcher\Applicaton {

    /**
     * Собственно ланчер. Реализация патерна commands
     *
     * @return bool
     */
    public function run() {
        if(parent::run()) {
            Logger::bootstrap('Application started')->show();

            $param = $this->resolve();
            $controller = $param[0];
            $action = $param[1];

            if ($controller) {
                echo $this->runRoute($controller, $action);
            }

            return true;
        }
    }


    /**
     * Разбираем комманды и получаем роуты для них и входящие параметры
     *
     * @return array
     */
    public function resolve() {

        $uri = $_SERVER['REQUEST_URI'];
        $route = substr($uri, 1);
        $params = explode('/', $route);
        $controller = isset($params[0]) ? $params[0] : 'default';
        $action = isset($params[1]) ? $params[1] : 'index';

        return [ucfirst($controller), $action];
    }

    /**
     * Обощенный стартер выполнения команд
     *
     * @param $command
     * @param array $options
     */
    protected function runRoute ($controller, $action) {
        if ($this->hasRoute($controller, $action)) {

            $path = Applicaton::getAlias("@controllers/{$controller}.php");
            $class = '\controllers\\' . $controller;

            require_once $path;
            $object = new $class;
            return $object->$action();
        }
        else {
            return $this->runRoute ('Notfound', 'index');
        }
    }

    /**
     * Проверяем наличие консольной команды
     *
     * @param $command
     * @return bool
     */
    protected function hasRoute ($controller, $action) {

        $path = Applicaton::getAlias("@controllers/{$controller}.php");
        $class = '\controllers\\' . $controller;

        if(file_exists ($path)) {
            require_once $path;
            $object = new $class;
            return method_exists($object, $action);
        }
        return false;
    }
}