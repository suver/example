<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 01.10.16
 * Time: 10:35
 */

require_once __DIR__ . '/../vendor/web/Application.php';
$config = require __DIR__ . '/../config.php';

use vendor\web\Applicaton;
use vendor\web\Logger;

Logger::setLogLevel(Logger::LEVEL_DEBUG);

//defined('APP_ENV') or define('APP_ENV', 'console');

$appliacation = Applicaton::bootstrap($config);
$appliacation->run();