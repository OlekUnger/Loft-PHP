<?php
error_reporting(0);
session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');
require_once 'vendor/autoload.php';
//require_once(ROOT . '/components/Autoload.php');

$router = new Router();
$router->run();
