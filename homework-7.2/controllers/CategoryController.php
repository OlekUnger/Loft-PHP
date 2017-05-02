<?php

class CategoryController
{

    public function actionItem($id)
    {
        $category_list = Category::getCategoriesList();
        $category = Category::getCategoryById($id);
        $products = Category::getProductsByCategory($id);
        Twig::getContent('/category/item.twig', array('title' => $category_list['name'],
            'main' => 'userlist',
            'category'=>$category,
            'products'=>$products,
            'category_list' => $category_list,
            'activePage' => $_SERVER['REQUEST_URI'],
        ));
        return true;
    }
}