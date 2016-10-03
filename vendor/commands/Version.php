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

class Version extends Command {

    public function execute($options)
    {
        echo Colorized::string("\n--------------------------------\n", "cyan");
        echo Colorized::string("For example of my coding!", "yellow", "magenta");
        echo Colorized::string("\n--------------------------------\n", "cyan");
    }

}