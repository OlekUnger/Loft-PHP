<?php
require (ROOT.'/config/connect.php');
use Illuminate\Database\Capsule\Manager as Capsule;

if (!Capsule::schema()->hasTable('categories')) {
    Capsule::schema()->create('categories', function ($table) {
        $table->increments('id');
        $table->string('name');
    });
}