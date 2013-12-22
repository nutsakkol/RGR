<?php
session_start();
$myFramework = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'core/Route.php';
$configure = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config/Configure.php';

require_once($configure);
require_once($myFramework);

$conf = new Configure();
Route::run();