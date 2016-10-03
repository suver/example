<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 8:42
 */

namespace vendor\application;

require_once 'LoggerAbstract.php';

class Logger extends LoggerAbstract {


    /**
     * Информационное соообщение
     *
     * @param $string
     * @return mixed
     */
    public static function info($string) {
        static::$logs[] = new LoggerMessage('info', $string);
        return static::getInstance();
    }

    /**
     * Лог
     *
     * @param $string
     * @return mixed
     */
    public static function log($string) {
        static::$logs[] = new LoggerMessage('log', $string);
        return static::getInstance();
    }

    /**
     * Сообщение дебагера
     *
     * @param $string
     * @return mixed
     */
    public static function debug($string) {
        static::$logs[] = new LoggerMessage('debug', $string);
        return static::getInstance();
    }

    /**
     * Предупреждение
     *
     * @param $string
     * @return array
     */
    public static function warning($string) {
        static::$logs[] = new LoggerMessage('warning', $string);
        return static::getInstance();
    }

    /**
     * Анотация
     *
     * @param $string
     * @return mixed
     */
    public static function notice($string) {
        static::$logs[] = new LoggerMessage('notice', $string);
        return static::getInstance();
    }

    /**
     * Чертовски важное сообщение
     *
     * @param $string
     * @return mixed
     */
    public static function important($string) {
        static::$logs[] = new LoggerMessage('important', $string);
        return static::getInstance();
    }

    /**
     * Системные сообщения приложения
     *
     * @param $string
     * @return mixed
     */
    public static function bootstrap($string) {
        static::$logs[] = new LoggerMessage('bootstrap', $string);
        return static::getInstance();
    }

    /**
     * Чертовски важное сообщение
     *
     * @param $string
     * @return mixed
     */
    public static function trace($string) {
        static::$logs[] = new LoggerMessage('trace', $string);
        return static::getInstance();
    }

    /**
     * Когда все хорошо
     *
     * @param $string
     * @return mixed
     */
    public static function success($string) {
        static::$logs[] = new LoggerMessage('success', $string);
        return static::getInstance();
    }

    /**
     * Когда все плохо
     *
     * @param $string
     * @return mixed
     */
    public static function fail($string) {
        static::$logs[] = new LoggerMessage('fail', $string);
        return static::getInstance();
    }

    /**
     * Когда ошибка
     *
     * @param $string
     * @return mixed
     */
    public static function error($string) {
        static::$logs[] = new LoggerMessage('error', $string);
        return static::getInstance();
    }

    /**
     * @see \vendor\application\Logger::stdout
     */
    public static function stdout(LoggerMessage $loggerMessage)
    {
        if($loggerMessage) {
            return $loggerMessage->string . "\n";
        }
    }


}