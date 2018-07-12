<?php include ROOT . '/views/layouts/header.php';
?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form"><!--login form-->
                    <h2>Редактирование данных</h2>
                    <?php if($result): ?>
                    <h2>Данные отредактированы!</h2>
                    <?php else:?>
                    <form action="#" method="post">
                        <p>Имя</p>
                        <input type="text" name="name" placeholder="Name" value="<?=$_SESSION['nameEdit']?>"/>
                        <span><?php if(isset($errorsEdit)) echo $errorsEdit['name']; ?></span>
                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="Password"/>
                        <span><?php if(isset($errorsEdit)) echo $errorsEdit['password']; ?></span>
                        <button type="submit" name="submit" class="btn btn-default">Редактировать</button>
                    </form>
                    <?php endif;?>
                </div><!--/sign-up form-->
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>