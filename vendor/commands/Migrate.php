<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 11:32
 */

namespace vendor\commands;

use vendor\application\Command;
use vendor\console\Applicaton;
use vendor\console\Logger;
use vendor\migration\Migration;

class Migrate extends Command {

    public function execute($options)
    {
        $migration = new Migration;
        $migration->init();

        $files = scandir(Applicaton::getAlias('@migrations'));
        foreach ($files as $file) {
            if(!in_array($file, ['.', '..'])) {
                Logger::info('Find migration ' . $file);

                $migrationName = basename($file, '.php');
                $class = '\\migrations\\' . $migrationName;

                if(!$migration->checkMigrationAccept($migrationName)) {
                    require_once Applicaton::getAlias('@migrations/' . $file);
                    $object = new $class;
                    if ($object->execute()) {
                        $migration->migrationAccept($migrationName);
                    }
                }
            }
        }

    }

}