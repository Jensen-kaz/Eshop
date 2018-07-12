<?php

class CatalogController
{
    private $countShowAllProducts = 9;

    public function actionIndex($page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts($this->countShowAllProducts, $page);

        $total = Product::getTotalProductsAll();

        //Создаем постраничную навигацию
        $pagination = new Pagination($total, $page, $this->countShowAllProducts, 'page-');

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId,$page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        //Создаем постраничную навигацию
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT. '/views/catalog/category.php');
        return true;
    }
}