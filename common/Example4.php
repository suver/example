<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 22:45
 */

namespace common;

/**
 * Class Example4
 * @package common
 *
 * Способ 3
 * 1. В циклах проверяем все значения и находим дублируюшиеся
 */
class Example4 {

    public static function run($crop) {
        List($d1_index, $d2_index, $d_value) = self::search($crop);
        return [$d1_index, $d2_index, $d_value];
    }

    private static function search($crop) {
        foreach($crop as $k=>$val) {
            foreach($crop as $k1=>$val1) {
                if($val == $val1 && $k != $k1) {
                    return [$k, $k1, $val];
                }
            }
        }
        return [null, null, null];
    }
}