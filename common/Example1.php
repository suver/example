<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 22:45
 */

namespace common;

/**
 * Class Example1
 * @package common
 *
 * Первый способ.
 * 1. Убнраем дубликаты из массива
 * 2. Находим разницу между двумя массивами
 * 3. Получаем индексы и значения доублирующих элементов
 *
 */
class Example1 {

    public static function run($crop) {
        $ucrop = array_unique($crop, SORT_REGULAR);
        $dublicate = array_diff_key($crop, $ucrop);
        $d1_index = key($dublicate);
        $d_value = $dublicate[$d1_index];
        $d2_index = array_search($d_value, $crop);

        return [$d1_index, $d2_index, $d_value];
    }

}