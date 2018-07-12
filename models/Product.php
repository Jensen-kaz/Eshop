<?php

class Product
{
   const SHOW_BY_DEFAULT = 6; //Определяет количество товаров на одной стр.

    /**
     * Возвращает последние продукты
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1) * $count;

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
        . 'WHERE status = "1" '
        . 'ORDER BY id DESC '
        . 'LIMIT ' . $count
        . ' OFFSET '. $offset);

        $i=0;
        while($row=$result->fetch())
        {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productList;
    }

    /**
     * Подсчитывает общее количество продуктов
     */
    public static function getTotalProductsAll()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS countProductAll FROM product WHERE status = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['countProductAll'];
    }

    /**
     * Получает продукты в категории
     */
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if($categoryId)
        {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db= Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
            . "WHERE status = '1' AND category_id = '$categoryId' "
                . "ORDER BY id ASC "
                . "LIMIT ". self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset);

            $i=0;
            while($row=$result->fetch())
            {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    /**
     * Получает всю информацию об одном товаре
     */
    public static function getProductById($productId)
    {
        $id = intval($productId);

        if($id)
        {
            $db=Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id=' . $productId);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    /**
     * Подсчитывает количество продуктов в категории
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM product "
        . "WHERE status = '1' AND category_id = '$categoryId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Возвращвет список товаров по заданным id
     */
    public static function getProductsByIds($productsIdsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $productsIdsArray);

        $sql = "SELECT * FROM product WHERE status = '1' AND id IN ($idsString)";

        $result= $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while($row = $result->fetch())
        {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    /**
     * Возвращвет список рекомендуемых товаров из БД
     */
    public static function getRecomendedProducts()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT id, name, price, image, is_new FROM product WHERE is_recommended = '1' "
        . "ORDER BY id DESC");

        $reccomended = array();
        $i = 0;
        while($row = $result->fetch())
        {
            $reccomended[$i]['id'] = $row['id'];
            $reccomended[$i]['name'] = $row['name'];
            $reccomended[$i]['price'] = $row['price'];
            $reccomended[$i]['image'] = $row['image'];
            $reccomended[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $reccomended;
    }
}