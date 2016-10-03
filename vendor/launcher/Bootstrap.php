<?php
/**
 * Класс описывающий модель загрузки всего приложения. Тут подключаются важные приложению компоненты
 *
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */

namespace vendor\launcher;

require_once 'Launcher.php';

class Bootstrap extends Launcher {

    /**
     * Инициализатор
     * Определяет базовые параметры
     */
    public function init() {
        parent::init();
    }

    /**
     * Автозагрузка
     *
     * @param $name
     */
    public static function autoload($name) {
        $include = Applicaton::getAlias('@' . str_replace('\\','/',$name).'.php');
        require_once $include;
    }

}


spl_autoload_extensions(".php");
spl_autoload_register(['\vendor\launcher\Bootstrap', 'autoload'], true, true);