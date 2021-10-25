<?php

use MvcToDo\Dispatcher;
use MvcToDo\Config\Core;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require_once __DIR__ . '/../vendor/autoload.php';

$dispatch = new Dispatcher();
$dispatch->dispatch();
