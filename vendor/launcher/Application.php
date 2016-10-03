<?php
/**
 * Клас запуска приложения
 *
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */

namespace vendor\launcher;

use vendor\db\Db;

require_once 'Bootstrap.php';

/**
 * Class Applicaton
 * @package launcher
 *
 * Реализует базовый класс загрузки приложения
 *
 */
class Applicaton extends Bootstrap {

    protected static $applicationInstance;
    private static $config;
    public static $app;

    /**
     * Инициализатор
     * Определяет базовые параметры
     */
    public function init() {
        parent::init();

        if(!static::$app) {
            static::$app = new \stdClass();
        }

        static::$app->db = new Db(self::$config['database']);
    }

    final public static function getInstance() {
        if(!self::$applicationInstance) {
            self::$applicationInstance = new static();
        }
        return self::$applicationInstance;
    }

    /**
     * Простая реализация синглтона, без ограничений. Служит для предотвращения запуска одновременных
     * копий базовой подпрограммы
     *
     * @return Applicaton
     *
     */
    public static function bootstrap($config) {
        self::getInstance();
        self::$config = $config;
        static::$applicationInstance->init();
        return self::$applicationInstance;
    }

    /**
     * Стартует приложение
     *
     * @return bool
     */
    public function run() {
        return true;
    }

}