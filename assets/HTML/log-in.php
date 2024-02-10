<?php include ('./../../path.php');?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--=============================== стили BOOTSTRAP ==================================================================================================================-->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">


    <!--=============================== ШРИФТЫ ==================================================================================================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet">

    <!--=============================== СБРОС СТИЛЕЙ ==================================================================================================================-->
    <link rel="stylesheet" href="../CSS/reset.css">
    <!--=============================== МОИ СТИЛИ ==================================================================================================================-->
    <link rel="stylesheet" href="../CSS/all.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <!--    <link rel="stylesheet" href="../CSS/first-page.css">-->
    <!--    <link rel="stylesheet" href="../CSS/slider.css">-->
    <!--    <link rel="stylesheet" href="../CSS/single.css">-->
    <link rel="stylesheet" href="../CSS/reg-log.css">
    <link rel="stylesheet" href="../CSS/footer.css">

    <title>site</title>
</head>
<body>


<div class="wraper">

    <header class="cotainer-fluid header">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1><a href=" ">Мой Сайт</a></h1>
                </div>
                <nav class="col-8">
                    <ul>
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Услуги</a></li>

                        <li>
                            <a class="cabinet" href="#">Кабинет</a>
                            <ul class="vipadat">
                                <li><a href="https://getbootstrap.com/">Админ панель</a></li>
                                <li><a href="https://getbootstrap.com/">Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">

        <div class="container-fluid reg-form">
            <h2>Авторизоваться</h2>

            <div>
                <label>
                    <p>почтовый ящик</p>
                    <input type="email">
                </label>
            </div>
            <div>
                <label>
                    <p>пароль</p>
                    <input type="password">
                </label>
            </div>

            <a>Зарегистрироваться</a>
            <button href="">Войти</button>


        </div>


    </main>


    <footer class="footer container-fluid">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur deserunt enim itaque minima numquam
            ratione unde voluptatum.
            A eaque esse et facilis ipsum libero recusandae! Alias amet, aut cum cumque dolorum, est et eveniet quasi
            repellat reprehenderit
            tenetur veritatis voluptas voluptatem?
        </p>
    </footer>


</div>