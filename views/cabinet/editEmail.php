<?php include ROOT . '/views/layouts/header.php'; ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form"><!--login form-->
                    <?php if($result):
                        echo '<meta http-equiv = "Refresh" content = "0 ; URL=/cabinet/edit/">'; exit();?>
                    <?php else: ?>
                        <h2>Редактирование данных</h2>
                        <form action="#" method="post" id="nameEdit">
                            <p>Email</p>
                            <input type="email" name="email" placeholder="Email"/>
                            <span><?php if(isset($errorsEdit) && is_array($errorsEdit)):?>
                                    <?php foreach ($errorsEdit as $errors) echo $errors;?>
                                <?php endif;?>
                            </span>
                            <button class="btn btn-alt" type="submit" name="submit">Сохранить</button>
                            <br/>
                        </form>
                        <form action="/cabinet/edit/">
                            <button class="btn btn-alt" type="submit">Отмена</button>
                        </form>
                    <?php endif; ?>
                </div><!--/sign-up form-->
            </div>
        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
