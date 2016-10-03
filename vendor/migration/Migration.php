<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 11:21
 */

namespace vendor\migration;

use vendor\console\Applicaton;
use vendor\console\Logger;

class Migration extends Applicaton {

    public function init() {

        if(!$this->checkTableExists('migrations')) {
            $this->queryApply('CREATE TABLE `migrations` ( 
                    `id` INT(11) NOT NULL AUTO_INCREMENT , 
                    `migrations` VARCHAR(255) NOT NULL , 
                    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                PRIMARY KEY (`id`), 
                INDEX `migrations` (`migrations`)
            ) ENGINE = InnoDB;');
        }

    }

    public function checkTableExists($table) {
        return Applicaton::$app->db->prepare('DESCRIBE `'.$table.'`')->execute();
    }

    public function queryApply($query) {
        $pdo = Applicaton::$app->db->prepare($query);
        if($pdo->execute()) {
            Logger::debug($query)->success('query successful')->show();
            return true;
        }
        else {
            Logger::debug($query)->error($pdo->errorInfo())->fail('query fail')->show();
            return false;
        }
    }

    public function checkMigrationAccept($migration) {
        $query = Applicaton::$app->db->prepare("SELECT * FROM `migrations` WHERE `migrations` = '{$migration}'");
        $query->execute();
        $exists = $query->fetchAll();
        return $exists ? true : false;
    }


    public function migrationAccept($migration) {
        $query = Applicaton::$app->db->prepare("INSERT INTO `migrations` SET migrations = '{$migration}'");
        return $query->execute();
    }

}