<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 6:35
 */

namespace vendor\console;


/**
 * Class Colorized
 * @package vendor\console
 *
 * Разукрашивает строку вывода для консольных приложений BASH
 */
class Colorized {

    /**
     * @var string
     *
     * Вернуть все по умолчанию
     */
    protected static $reset = "\033[0m";

    /**
     * @var array
     *
     * Допустимые цвета шрифта
     */
    protected static $foregroundColors = [
        'black' => '0;30',
        'dark_gray' => '1;30',
        'blue' => '0;34',
        'light_blue' => '1;34',
        'green' => '0;32',
        'light_green' => '1;32',
        'cyan' => '0;36',
        'light_cyan' => '1;36',
        'red' => '0;31',
        'light_red' => '1;31',
        'purple' => '0;35',
        'light_purple' => '1;35',
        'brown' => '0;33',
        'yellow' => '1;33',
        'light_gray' => '0;37',
        'white' => '1;37',
    ];

    /**
     * @var array
     *
     * Допустимые цвета фона
     */
    protected static $backgroundColors = [
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47',
    ];

    public static function getForegroundColors() {
        if(!in_array(PHP_OS, ['Linux', 'FreeBSD'])) {
            return [];
        }
        return array_keys(self::$foregroundColors);
    }

    public static function getBackgroundColors() {
        if(!in_array(PHP_OS, ['Linux', 'FreeBSD'])) {
            return [];
        }
        return array_keys(self::$backgroundColors);
    }

    public static function string($string, $fontColor=false, $backgroundColor=false) {
        if(in_array(PHP_OS, ['Linux', 'FreeBSD'])) {

            if($fontColor && isset(static::$foregroundColors[$fontColor]))
                $string = "\033[" . static::$foregroundColors[$fontColor] . "m" . $string;

            if($backgroundColor && isset(static::$backgroundColors[$backgroundColor]))
                $string = "\033[" . static::$backgroundColors[$backgroundColor] . "m" . $string;

            $string = $string . static::$reset;

            return $string;
        }
        else {
            return $string;
        }
    }

    public static function test() {
        $backgroundColors = static::getBackgroundColors();
        $foregroundColors = static::getForegroundColors();

        foreach ($backgroundColors as $bg) {
            foreach ($foregroundColors as $fg) {
                echo static::string("font {$fg}, backgrount {$bg}", $fg, $bg) . "\n";
            }
        }
    }

}

