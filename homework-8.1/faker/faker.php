<?php
require_once './connect.php';

class Faker
{
    public static function getFaker()
    {
        $checkCategories = CategoryTable::get()->toArray();
        $checkProducts = ProductTable::get()->toArray();
        $messages = [];
        if (empty($checkProducts)) {
            $messages[] = "Таблица 'products' пустая";

        } else {
            $messages[] = "Таблица 'products' не пустая";
        }
        if (empty($checkCategories)) {
            $messages[] = "Таблица 'categories' пустая";
        } else {
            $messages[] = "Таблица 'categories' не пустая";
        }
        if (isset($_POST['add'])) {
            if (empty($checkCategories)) {
                Faker\Factory::create();
                for ($i = 1; $i < 6; $i++) {
                    $category = new CategoryTable();
                    $category->name = 'Category ' . $i;
                    $category->save();
                }
                $messages[] = "Контент в таблицу 'categories' добавлен";

            }

            $faker = Faker\Factory::create();
            for ($i = 1; $i < 5; $i++) {
                $product = new ProductTable();
                $product->name = $faker->word;
                $product->category_id = $faker->numberBetween($min = 1, $max = 5);
                $product->price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 20.00, $max = 2000.00);
                $product->description = $faker->text(100);
                $product->save();
            }
            $messages[] = "Контент в таблицу 'products' добавлен";
            header('Refresh:.5;faker.php');
        }
        return $messages;
    }
}