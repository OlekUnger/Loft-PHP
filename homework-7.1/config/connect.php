<?php
require_once('./vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;

foreach (glob(__DIR__ . '/models/*.php') as $filaname) {
    require_once $filename;
}

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();