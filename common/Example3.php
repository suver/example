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
 * 1. Берем цикл, с его помощью начинаем формировать второй пустой массив, где ключами будут значения массива
 * 2. Сверяя наличие значение в индексе нового массива будет искомым значением
 */
class Example3 {

    public static function run($crop) {
        $map = [];
        $count = count($crop);
        for($i=0;$i<=$count;$i++) {
            if(!$map[$crop[$i]]) {
                $map[$crop[$i]] = $i;
            }
            else {
                return [$map[$crop[$i]], $i, $crop[$i]];
            }
        }
        return [null, null, null];
    }

}
