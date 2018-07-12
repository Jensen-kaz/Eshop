<?php
include ROOT . '/views/layouts/header.php';
?>
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <div class="signup-form"><!--login form-->
                        <h2>Оформление заказа</h2>
                        <?php if($result): ?>
                        <h2>Заказ оформлен! Наши специалисты свяжутся с Вами для уточнения деталей заказа.</h2>
                        <?php else: ?>
                        <p>Выбрано товаров: <?=$totalAmount?>, на сумму: <?=$totalPrice?>$</p>
                        <form action="#" method="post">
                            <p>Ваше имя</p>
                            <input type="text" name="userName" placeholder="Name" value="<?=$_SESSION['userName']?>" />
                            <span><?php if(is_array($errors)) echo $errors['name'];?></span>
                            <p>Номер телефона (Напр. +7----------)</p>
                            <input type="text" name="userPhone" placeholder="Your Phone" value="<?=$_SESSION['userPhone']?>" />
                            <span><?php if(is_array($errors)) echo $errors['phone'];?></span>
                            <p>Zip Код</p>
                            <input type="text" name="zipCode" placeholder="" value="<?=$_SESSION['zipcode']?>"/>
                            <span><?php if(is_array($errors)) echo $errors['zip'];?></span>
                            <p>Комментарии к заказу</p>
                            <input type="text" name="userComment" placeholder="Your Comment"/>
                            <br/>
                            <button type="submit" name="orderSubmit" class="btn btn-default">Отправить</button>
                        </form>
                        <?php endif; ?>
                    </div><!--/sign-up form-->
                </div>
            </div>
        </div>
    </section>
<?php include ROOT . '/views/layouts/footer.php'; ?>