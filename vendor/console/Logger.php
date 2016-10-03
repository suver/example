<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 6:35
 */

namespace vendor\console;
use vendor\application\LoggerMessage;

/**
 * Class Logger
 * @package vendor\console
 *
 * Управляет выводом логов
 */
class Logger extends \vendor\application\Logger {

    /**
     * @see \vendor\application\Logger::stdout
     */
    public static function stdout(LoggerMessage $loggerMessage)
    {
        if($loggerMessage) {
            switch ($loggerMessage->type) {
                case 'info':
                    return Colorized::string($loggerMessage->getOfString()) . "\n";
                    break;

                case 'log':
                    return Colorized::string($loggerMessage->getOfString(), '') . "\n";
                    break;

                case 'debug':
                    return Colorized::string($loggerMessage->getOfString(), 'light_blue') . "\n";
                    break;

                case 'warning':
                    return Colorized::string($loggerMessage->getOfString(), 'light_red') . "\n";
                    break;

                case 'notice':
                    return Colorized::string($loggerMessage->getOfString(), 'yellow') . "\n";
                    break;

                case 'important':
                    return Colorized::string($loggerMessage->getOfString(), 'white', 'magenta') . "\n";
                    break;

                case 'bootstrap':
                    return Colorized::string($loggerMessage->getOfString(), 'white', 'magenta') . "\n";
                    break;

                case 'trace':
                    return Colorized::string($loggerMessage->getOfString(), 'light_gray') . "\n";
                    break;

                case 'success':
                    return Colorized::string($loggerMessage->getOfString(), 'light_green') . "\n";
                    break;

                case 'error':
                    return Colorized::string($loggerMessage->getOfString(), 'light_red', 'black') . "\n";
                    break;

                case 'fail':
                    return Colorized::string($loggerMessage->getOfString(), 'white', 'red') . "\n";
                    break;



                default:
                    return $loggerMessage->getOfString() . "\n";
            }
        }
    }
}

