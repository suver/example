#!/usr/bin/env php
<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */


require_once __DIR__ . '/vendor/console/Application.php';
$config = require __DIR__ . '/config.php';

use common\Test;
use vendor\console\Applicaton;
use vendor\console\Logger;

Logger::setLogLevel(Logger::LEVEL_TRACE);

//defined('APP_ENV') or define('APP_ENV', 'console');

$appliacation = Applicaton::bootstrap($config);
$appliacation->run();



/** LOGGER EXAMPLE */
/*
echo Logger::info('Проерка');

$logger = Logger::getInstance();
$logger->info('Проерка 1')
        ->warning('Проерка 2')
        ->notice('Проерка 3')
        ->important('Проерка 4')
        ->show();
*/

