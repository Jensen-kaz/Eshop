<?php include ROOT . '/views/layouts/header.php';
?>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Свяжитесь <strong>с нами</strong></h2>
                <div id="gmap" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1157102.9734926866!2d37.09987846875002!3d55.498104748026456!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1530879402997"
                            width="100%" height="385" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <?php if($result): ?>
                    <div class="signup-form">
                    <h2>Ваше сообщение успешно отправлено!</h2>
                    </div>
                    <?php else:?>
                    <h2 class="title text-center">Обратная связь</h2>
                    <h5>Есть вопросы/пожелания ? Напишите нам, и наши специалисты вам помогут.</h5>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-12">
                            <input type="email" name="emailUser" class="form-control" required="required" placeholder="Email" value="<?=$_SESSION['userEmail']?>">
                            <span><?php if (isset($errors) && is_array($errors)) echo $errors[0];?></span>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subjectUser" class="form-control" required="required" placeholder="Тема" value="<?=$_SESSION['userSubject']?>">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="userMessage" id="message" required="required" class="form-control" rows="8" placeholder="Введите свое сообщение"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Отправить">
                        </div>
                    </form>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Контактная информация</h2>
                    <address>
                        <p>E-Shop Inc.</p>
                        <p>Moscow Russia</p>
                        <p>Mobile: +7 (380) 45-32-24</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: eshopsupport@gmail.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Социальные сети</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/?lang=ru" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/discover" target="_blank"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->

<?php include ROOT . '/views/layouts/footer.php'; ?>
