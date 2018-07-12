<?php


class CartController
{
    public function actionAdd($id)
    {
        //Добавляем товар в корзину
        Cart::addProduct($id);

        //Возвращаем пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }

    //Обработка асинхронного запроса
    public function actionAddAjax($id)
    {
        //Добавляем товар в корзину
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
//        $categories = array();
//        $categories = Category::getCategoriesList();

        $cityDelivery = array();
        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if($productsInCart)
        {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        $cityDelivery = CartModel::getCitiesDelivery();


        require_once (ROOT. '/views/cart/index.php');
        return true;
    }

    public function actionCheckout()
    {
//        $categories = array();
//        $categories = Category::getCategoriesList();

        $result = false;

        if(isset($_POST['submitZip']))
        {
            $zipCode = htmlspecialchars($_POST['zipCode']);
            $_SESSION['zipcode'] = $zipCode;
        }

        if(isset($_POST['orderSubmit']))
        {
            //Отправляем форму

            $userName = htmlspecialchars($_POST['userName']);
            $userPhone = htmlspecialchars($_POST['userPhone']);
            $zipCode = htmlspecialchars($_POST['zipCode']);
            $userComment = htmlspecialchars($_POST['userComment']);
            $_SESSION['userName'] = $userName;
            $_SESSION['userPhone'] = $userPhone;
            $_SESSION['zipcode'] = $zipCode;

            $errors = false;

            //Валидация полей
            if(!User::checkZipCode($zipCode))
            {
               $errors['zip'] = "Введен не корректный zip-код";
            }

            if(!User::checkName($userName))
            {
                $errors['name'] = 'Имя не должно быть короче 2-х символов';
            }

            if(!User::checkPhone($userPhone))
            {
                $errors['phone'] = 'Неправильный телефон';
            }

            if($errors == false)
            {
                //Форма заполнена корректно, сохраняем заказ в БД

                $productsInCart = Cart::getProducts();
                if(User::isGuest())
                {
                    $userId = false;
                }
                else
                {
                    $userId = User::checkLogged();
                }

                $result = Order::save($userId,$userName,$userPhone,$userComment,$zipCode,$productsInCart);

                //Отправляем email после добавления данных в БД
                if($result)
                {
                    $adminEmail = 'admineshop@gmail.com';
                    $subject = 'Новый заказ!';
                    $message = 'http://eshop/admin/orders';
                    $headers = "Content-type:text/html; charset = windows-1251 \r\n";
                    $headers.= "From: userorder ";
                    $headers.= "Reply to userorder";
                    mail($adminEmail,$subject,$message,$headers);

                    Cart::clear();
                }
            }
            else
            {
                //Форма заполнена неккоректно - выводим итоги покупок

                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalAmount = Cart::countCartItems();
            }

        }
        else
        {
            //Форма не отправлена

            $productsInCart = Cart::getProducts();
            if($productsInCart == false)
            {
                header("Location: /");
            }
            else
            {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalAmount = Cart::countCartItems();

                $_SESSION['userPhone'] = '';
                $_SESSION['userName'] = '';

                if(User::isGuest())
                {
                    //Пустые данные в форме
                }
                else
                {
                    //Получаем информацию о пользователе
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $_SESSION['userName'] = $user['name'];
                }
            }
        }

        require_once (ROOT. '/views/cart/checkout.php');
        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart/");
        return true;
    }
}