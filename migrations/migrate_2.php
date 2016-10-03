<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 13:29
 */

namespace migrations;

class migrate_2 extends \vendor\migration\Migration {

    public function execute() {

        for($i=0; $i<=99; $i++) {
            $x = rand(1, 100);
            $y = rand(1, 100);
            $value = rand(1, 99999);
            $this->queryApply("INSERT INTO `matrix` SET `x`=$x, `y`=$y, `value`=$value");
        }

        return true;

    }

}