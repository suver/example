<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 22:45
 */

namespace common;

/**
 * Class Example3
 * @package common
 *
 * Способ 3
 * 1. array_walk находит дубли и ставит вместо его значения dublicate
 * 2. находим dublicate
 * 3. Получаем 1 индекс и значение
 * 4. Находим второй индекс
 */
class Example3 {

    public static function run($crop) {
        $dublicate = $crop;
        array_walk($dublicate, function (&$item, &$key, &$crop) {
            unset($crop[$key]);
            if(in_array($item, $crop)) {
                $item = 'dublicate';
            }
        }, $crop);

        $d1_index = array_search('dublicate', $dublicate);
        $d_value = $crop[$d1_index];
        $d2_index = array_search($d_value, $dublicate);

        return [$d1_index, $d2_index, $d_value];
    }

}