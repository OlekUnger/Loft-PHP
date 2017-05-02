<?php
//error_reporting(-1);
session_start();

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/config/connect.php');

require_once(ROOT . '/libs/Twig.php');
require_once(ROOT . '/libs/PHPMail.php');
require_once(ROOT . '/libs/InterventionImage.php');
require_once(ROOT . '/libs/Gump.php');

require_once 'vendor/autoload.php';

include_once ROOT . '/models/Register.php';
include_once ROOT . '/models/Login.php';
include_once ROOT . '/models/Profile.php';
include_once ROOT . '/models/Users.php';
include_once ROOT . '/models/Db.php';
include_once ROOT . '/models/Post.php';


//require_once(ROOT . '/Faker.php');

//require_once(ROOT . '/components/Autoload.php');


$router = new Router();
$router->run();
