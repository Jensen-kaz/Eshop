<?php include ROOT . '/views/layouts/header.php';
?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form"><!--login form-->
                    <h2>Редактирование данных</h2>

                    <form action="#" method="">
                        <p>Имя</p>
                        <input type="text" name="name" placeholder="Name" value="<?=$_SESSION['cabinetUserName']?>"/>
                        <span><?php if(isset($errorsEdit) && is_array($errorsEdit)) echo $errorsEdit['name']; ?></span>
                        <a class="btn btn-alt" href="/cabinet/editname/<?php ?>">Редактировать</a>
                        <br/>
                        <br/>
                        <p>Email</p>
                        <input type="email" name="email" placeholder="Email" value="<?=$_SESSION['cabinetUserEmail']?>"/>
                        <span><?php if(isset($errorsEdit) && is_array($errorsEdit)) echo $errorsEdit['name']; ?></span>
                        <a class="btn btn-alt" href="/cabinet/editemail/">Редактировать</a>
                        <br/>
                        <br/>
                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="Password" value="******"/>
                        <span><?php if(isset($errorsEdit)) echo $errorsEdit['password']; ?></span>
                        <a class="btn btn-alt" href="/cabinet/editpassword/">Редактировать</a>
                    </form>

                </div><!--/sign-up form-->
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>