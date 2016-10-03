<?php
/**
 * Класс определеяющий способы загрузки коомпонентов и поведение при загрузки всего приложения
 *
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */

namespace vendor\launcher;


class Launcher {

    public static $aliases = [
        '@vendor' => __DIR__ . '/..',
        '@root' => '@vendor/..',
        '@common' => '@root/common',
        '@commands' => '@root/commands',
        '@controllers' => '@root/controllers',
        '@migrations' => '@root/migrations',
        '@views' => '@root/views',
        '@layouts' => '@root/layouts',
    ];

    /**
     * Инициализатор
     * Определяет базовые параметры
     */
    public function init() {
        foreach (self::$aliases as $key=>$alias) {
            self::setAlias($key, $alias);
        }
    }

    /**
     * Служит для указания алиаса. Все алиасы начинаются с собачки.
     *
     * @common => /var/www/appliaction/common
     * @vendor => /var/www/appliaction/vendor
     *
     * @param $alias
     * @param $path
     */
    public static function setAlias($alias, $path) {
        if (strncmp($alias, '@', 1)) {
            $alias = '@' . $alias;
        }

        if ($path !== null) {
            $path = strncmp($path, '@', 1) ? rtrim($path, '\\/') : static::getAlias($path);
            static::$aliases[$alias] = $path;
        }
        else if (isset(static::$aliases[$alias])) {
            unset(static::$aliases[$alias]);
        }
    }

    /**
     * Формирует путь из алиаса в общепринятый
     *
     * @param $alias
     */
    public static function getAlias($alias, $throwException=true) {
        if (strncmp($alias, '@', 1)) {
            // not an alias
            return $alias;
        }

        $pos = strpos($alias, '/');
        $root = $pos === false ? $alias : substr($alias, 0, $pos);
        if (isset(static::$aliases[$root])) {
            return $pos === false ? static::$aliases[$root] : static::$aliases[$root] . substr($alias, $pos);
        }

        if ($throwException) {
            throw new \ErrorException("Invalid path alias: $alias");
        }
        else {
            return false;
        }
    }

}