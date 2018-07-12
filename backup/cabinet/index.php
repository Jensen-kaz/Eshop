<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="signup-form">

            <h2>Кабинет пользователя</h2>

            <h2>Добро пожаловать, <?=$user['name'];?>!</h2>
            <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="/cabinet/edit">Редактировать данные </a></li>
                <li><a href="/cabinet/history">Список покупок</a></li>
            </ul>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
