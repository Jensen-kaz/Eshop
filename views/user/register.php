<?php
include ROOT . '/views/layouts/header.php';
?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Войти в аккаунт</h2>
                    <form action="#" method="post">
                        <input type="email" name="emailLogin" placeholder="Email Address" value="<?=$_SESSION['emailLogin']?>"/>
                        <span> <?php if(isset($errorsLogin) && is_array($errorsLogin)) echo $errorsLogin['emailLogin'];?> </span>
                        <input type="password" name="passwordLogin" placeholder="Password" />
                        <span> <?php if(isset($errorsLogin) && is_array($errorsLogin)):?>
                                    <?=$errorsLogin['passwordLogin'];?>
                                    <?=$errorsLogin['wrongData']; endif;?>
                                    </span>
                        <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                        <button type="submit" name="submitLogin" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">ИЛИ</h2>
            </div>
            <div class="col-sm-4">
                <?php if($result): ?>
                <div class="signup-form">
                <h2>Вы зарегистрированы!</h2>
                </div>
                <?php else :?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация нового пользователя</h2>
                    <form action="" method="post">
                        <input type="text" name="regName" placeholder="Name" value="<?=$_SESSION["regName"]?>" />
                        <span> <?php if(isset($errors) && is_array($errors)) echo $errors['name'];?> </span>
                        <input type="email" name="regEmail" placeholder="Email Address" value="<?=$_SESSION["regEmail"]?>"/>
                        <span>
                            <?php if(isset($errors) && is_array($errors)):?>
                                <?php if(array_key_exists('email', $errors)) echo $errors['email'];
                                   if(array_key_exists('checkEmail', $errors)) echo $errors['checkEmail'];
                                    endif; ?>
                        </span>
                        <input type="password" name="regPassword" placeholder="Password"/>
                        <span> <?php if(isset($errors) && is_array($errors)) echo $errors['password'];?> </span>
                        <button type="submit" name="regSubmit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->
            <?php endif;?>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php include ROOT . '/views/layouts/footer.php'; ?>