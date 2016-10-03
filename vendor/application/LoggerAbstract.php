<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 8:42
 */

namespace vendor\application;

abstract class LoggerAbstract {

    protected static $logLevel = 1;
    protected static $typeLevel = [
        'trace' => 1,
        'debug' => 2,
        'notice' => 3,
        'warning' => 4,
        'important' => 5,
        'bootstrap' => 6,
        'success' => 7,
        'fail' => 8,
        'error' => 9,
        'info' => 19,
        'log' => 19,
    ];

    protected static $excludeType = [

    ];

    const LEVEL_TRACE = 1;
    const LEVEL_DEBUG = 2;
    const LEVEL_NOTICE = 3;
    const LEVEL_WARNING = 4;
    const LEVEL_IMPORTANT = 5;
    const LEVEL_BOOTSTRAP_INFO = 5;
    const LEVEL_MESSAGE = 7;
    const LEVEL_SILENCE = 20;

    protected static $loggerInstance;
    protected static $logs = [];

    public static function getInstance() {
        if(!static::$loggerInstance) {
            static::$loggerInstance = new static();
        }
        static $logs = [];
        return static::$loggerInstance;
    }

    public static function setLogLevel($logLevel) {
        static::$logLevel = $logLevel;
    }


    /**
     * Управление выводом
     *
     * @return mixed
     */
    abstract public static function stdout(LoggerMessage $loggerMessage);

    public function show() {
        echo static::getInstance();
    }

    public function __toString()
    {
        $string = '';
        if(static::$logs && is_array(static::$logs)) {
            foreach(static::$logs as $log) {
                if(static::$typeLevel[$log->type] >= static::$logLevel && !in_array($log->type, static::$excludeType)) {
                    $string .= static::stdout($log);
                }
            }
        }

        static::$logs = [];

        return $string;
    }


}