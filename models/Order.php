<?php


class Order
{
    /**
     * Сохранение заказа
     */
    public static function save($userId,$userName,$userPhone,$userComment,$zipCode,$productsInCart)
    {
        //сохраняем массив в формате json
        $productsInCart =json_encode($productsInCart);

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_id, user_name, user_phone, user_comment, zip_code, products) '
                .'VALUES (:user_id, :user_name, :user_phone, :user_comment, :zip_code, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $result->bindParam(':user_name',$userName,PDO::PARAM_STR);
        $result->bindParam(':user_phone',$userPhone,PDO::PARAM_STR);
        $result->bindParam(':user_comment',$userComment,PDO::PARAM_STR);
        $result->bindParam(':zip_code',$zipCode,PDO::PARAM_INT);
        $result->bindParam(':products',$productsInCart,PDO::PARAM_STR);

        return $result->execute();
    }

}