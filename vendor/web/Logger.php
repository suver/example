<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 6:35
 */

namespace vendor\web;
use vendor\application\LoggerMessage;

/**
 * Class Logger
 * @package vendor\console
 *
 * Управляет выводом логов
 */
class Logger extends \vendor\application\Logger {

    protected static $excludeType = [
        'bootstrap',
    ];

    /**
     * @see \vendor\application\Logger::stdout
     */
    public static function stdout(LoggerMessage $loggerMessage)
    {
        if($loggerMessage) {
            switch ($loggerMessage->type) {
                case 'info':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'log':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'debug':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'warning':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'notice':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'important':
                    return $loggerMessage->getOfString(). "\n";
                    break;

                case 'bootstrap':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'trace':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'success':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'error':
                    return $loggerMessage->getOfString() . "\n";
                    break;

                case 'fail':
                    return $loggerMessage->getOfString() . "\n";
                    break;



                default:
                    return $loggerMessage->getOfString() . "\n";
            }
        }
    }
}

