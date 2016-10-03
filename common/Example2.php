<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 22:45
 */

namespace common;

/**
 * Class Example2
 * @package common
 *
 * Метод 2
 * 1. Сортируем массив
 * 2. Пробегаем сравнивая два ближайших элемента
 * 3. Одинаковые элементы будут наши дубли
 */
class Example2 {

    public static function run($crop) {
        asort($crop);
        while ($element = next($crop)) {
            if ($element == next($crop)) {
                $d_value = $element;
                $d1_index = key($crop);
                prev($crop);
                $d2_index = key($crop);
                break;
            }
            prev($crop);
        }

        return [$d1_index, $d2_index, $d_value];
    }

}