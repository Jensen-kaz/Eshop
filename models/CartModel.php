<?php


class CartModel
{
    public static function getCitiesDelivery()
    {
        $getCityArray = array();
        $db = Db::getConnection();
        $result = $db->query("SELECT city FROM order_info");

        $i=0;
       while ($row = $result->fetch(PDO::FETCH_ASSOC))
       {
           $getCityArray[$i]['city'] = $row['city'];
           $i++;
       }

       return $getCityArray;
    }
}