<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 11:32
 */

namespace vendor\commands;

use vendor\application\Command;
use vendor\console\Colorized;
use vendor\migration\Migration;

class Colorize extends Command {

    public function execute($options)
    {
        echo Colorized::string("\n--------------------------------\n", "cyan");
        echo Colorized::test();
        echo Colorized::string("\n--------------------------------\n", "cyan");
    }

}