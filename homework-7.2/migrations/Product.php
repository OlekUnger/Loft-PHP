<?php
require './config/connect.php';
use Illuminate\Database\Capsule\Manager as Capsule;

if (!Capsule::schema()->hasTable('products')) {
    Capsule::schema()->create('products', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('category_id');
        $table->float('price');
        $table->text('description');
    });
}
