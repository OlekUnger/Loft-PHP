<?php

class Goods
{

    public static function getProductsList()
    {
        $products_list = ProductTable::take(8)->get()->toArray();
        return $products_list;
    }

    public static function getProductById($id){
        $id = intval($id);
        if ($id) {
            $product=ProductTable::where('id','=',$id)->first()->toArray();
            return $product;
        }
    }

    public static function getProductByCategory($id)
    {

    }
}
