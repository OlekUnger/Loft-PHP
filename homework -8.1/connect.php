<?php
require_once './vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

//foreach (glob(__DIR__ . '/models/*.php') as $filaname) {
//    require_once $filename;
//}

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

if (!Capsule::schema()->hasTable('products')) {
    Capsule::schema()->create('products', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('category_id');
        $table->float('price');
        $table->text('description');
    });
}

if (!Capsule::schema()->hasTable('categories')) {
    Capsule::schema()->create('categories', function ($table) {
        $table->increments('id');
        $table->string('name');
    });
}

class ProductTable extends Illuminate\Database\Eloquent\Model
{
    protected $table = "products";
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('CategoryTable', 'category_id','id');
    }

}

class CategoryTable extends Illuminate\Database\Eloquent\Model
{
    protected $table = "categories";
    protected $quarded = ['id'];
    public $timestamps = false;

}

