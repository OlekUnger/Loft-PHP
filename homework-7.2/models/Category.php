<?php
class Category
{

    public static function getCategoriesList()
    {
        $category_list = CategoryTable::all()->toArray();
        return $category_list;
    }

    public static function getCategoryById($id)
    {

        $id = intval($id);
        if ($id) {
            $category=CategoryTable::where('id','=',$id)->first()->toArray();
            return $category;
        }
    }

    public static function getProductsByCategory($id)
    {
        if($id){
            $products=ProductTable::where('category_id', '=', $id)->take(8)->get()->toArray();
            return $products;
        }
    }
    public static function getCategoryByProduct($category_id)
    {
        if($category_id){
            $category=CategoryTable::where('id', '=', $category_id)->take(5)->get()->toArray();
            return $category;
        }
    }
}

