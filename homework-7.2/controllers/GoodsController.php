<?php

class GoodsController
{
    public function actionGoods()
    {
        $category_list = Category::getCategoriesList();
        $products_list = Goods::getProductsList();
        $products=Category::getCategoryByProduct($products_list['id']);
        Twig::getContent('/goods/goods.twig', array('title' => 'Товары',
            'main' => 'userlist',
            'category_list' => $category_list,
            'products'=>$products,
            'products_list' => $products_list,
            'activePage' => $_SERVER['REQUEST_URI']
        ));
        return true;
    }

    public function actionItem($id)
    {
        $category_list = Category::getCategoriesList();
        $product = Goods::getProductById($id);
        Twig::getContent('/goods/item.twig', array('title' => $product['name'],
            'main' => 'userlist',
            'category_list' => $category_list,
            'activePage' => $_SERVER['REQUEST_URI'],
            'product' => $product,
        ));
        return true;
    }

}