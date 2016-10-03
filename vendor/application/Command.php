<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 11:32
 */

namespace vendor\application;

use vendor\console\Applicaton;

abstract class Command extends Applicaton {

    abstract public function execute($options);

}