<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 13:29
 */

namespace migrations;

class migrate_1 extends \vendor\migration\Migration {

    public function execute() {

        return $this->queryApply('
            CREATE TABLE `matrix` ( 
                    `x` INT(11) NOT NULL , 
                    `y` INT(11) NOT NULL , 
                    `value` INT(5) NOT NULL , 
                PRIMARY KEY (`x`, `y`)
            ) ENGINE = InnoDB;
        ');


    }

}