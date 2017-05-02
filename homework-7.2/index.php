<?php
//error_reporting(-1);
session_start();

define('ROOT', dirname(__FILE__));
//require_once(ROOT.'vendor/autoload.php');
require_once(ROOT.'/components/Router.php');

require_once(ROOT . '/libs/Twig.php');

include_once (ROOT . '/models/Goods.php');
include_once (ROOT . '/models/Category.php');

include_once(ROOT . '/models/CategoryTable.php');
include_once (ROOT . '/models/ProductTable.php');

include_once (ROOT . '/migrations/Product.php');
include_once (ROOT . '/migrations/Category.php');

$router = new Router();
$router->run();
