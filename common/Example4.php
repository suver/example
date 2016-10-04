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
 * 1. В циклах проверяем все значения и находим дублируюшиеся, но при этом во второй циул начинаем от ключа выше
 *      текущего на +1, что бы измежать повторных проверок
 */
class Example4 {

    public static function run($crop) {
        List($d1_index, $d2_index, $d_value) = self::search($crop);
        return [$d1_index, $d2_index, $d_value];
    }

    private static function search($crop) {
        $count = count($crop);
        for($i=0;$i<=$count;$i++) {
            for($i1=$i+1;$i1<=$count;$i1++) {
                if($crop[$i] == $crop[$i1]) {
                    return [$i, $i1, $crop[$i1]];
                }
            }
        }
        return [null, null, null];
    }
}