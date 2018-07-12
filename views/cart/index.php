<?php require_once(ROOT. '/views/layouts/header.php');?>
<section id="cart_items">
    <div class="row">
        <div class="login-form">
            <h2 class="text-center">Корзина</h2>
        </div>
    </div>
    </div>
    <div class="container">
<!--        <div class="breadcrumbs">-->
<!--            <ol class="breadcrumb">-->
<!--<!--                <li><a href="#">Главн</a></li>-->
<!--<!--                <li class="active">Корзина</li>-->
<!--            </ol>-->
<!--        </div>-->
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Кол-во</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                <?php if(isset($products) && is_array($products)) foreach($products as $product): ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="images/cart/one.png" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?=$product['name']?></a></h4>
                        <p>Код товара: <?=$product['code']?></p>
                    </td>
                    <td class="cart_price">
                        <p><?=$product['price']?>$</p>
                    </td>
                    <td class="cart_price">
                        <p><?=$productsInCart[$product['id']]?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="/cart/delete/<?=$product['id']?>/"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
                <tr>
                    <td class="cart_price" colspan="3"><p>Общая стоимость</p></td>
                    <td class="cart_price">
                        <p><?=$totalPrice?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Хотите оформить заказ? </h3>
            <p>Заполните следующие поля</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <form action="/cart/checkout/" name="delivery-form" method="post">
                        <ul class="user_info">
                        <li class="single_field">
                            <label>Страна:</label>
                            <select>
                                <option>Россия</option>
                            </select>
                        </li>
                        <li class="single_field">
                            <label>Город:</label>
                            <select>
                                <?php foreach($cityDelivery as $city): ?>
                                <option><?=$city['city']?></option>
                                <?php endforeach;?>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip-код:</label>
                            <input type="text" name="zipCode">
                        </li>
                        </ul>
                        <button type="submit" name="submitZip" class="btn btn-default update" href="">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<?php require_once(ROOT. '/views/layouts/footer.php'); ?>