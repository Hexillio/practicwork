<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {   

    $name = $_POST['name'];
    $login = $_POST['login'];
    $email =$_POST['email'];
    $password =$_POST['password'];

    $host = "localhost";
    $user = "root";
    $pass = "12345678";
    $database = "user";

    $connect = new mysqli($host, $user, $pass, $database);
    $sql = "INSERT INTO `users`( `name`, `login`, `email`, `password`) 
            VALUES ('$name','$login ','[value-4]','[value-5]')";
    $result = 

} 

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="bootstrap.css" rel="stylesheet" />
</head>

<body>

<!-- header -->

    <header>

        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container p-3 fs-4">
            <a class="navbar-brand" href="#">Сайт</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Ссылки</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    </header>

<!-- section -->

    <section style="min-height: 80vh;">
    <div class="container py-3">
    <form class="w-50 mx-auto" method = "POST" action = "">

        <div class="mb-3">

            <label for="exampleInputName1" class="form-label">Имя</label>
            <input name = "name" type="text" class="form-control rounded-pill shadow-sm px-3" id="exampleInputName1" aria-describedby="nameHelp">

        </div>

        <div class="mb-3">

            <label for="exampleInputLogin1" class="form-label">Логин</label>
            <input name = "login" type="text" class="form-control rounded-pill shadow-sm px-3" id="exampleInputLogin1" aria-describedby="LoginHelp">

        </div>

        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input name = "email" type="email" class="form-control rounded-pill shadow-sm px-3" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="text">We'll never share your email with anyone else.</div>

        </div>

        <div class="mb-3">

            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name = "password" type="password" class="form-control rounded-pill shadow-sm px-3" id="exampleInputPassword1">

        </div>

        <div class="mb-3">

            <label for="exampleInput1" class="form-label"><?= $Error ?></label>
        
        </div>

            <button type="submit" class="btn btn-primary">Зарегестрироваться </button>

        </form>
    </div>
    </form>
    </section>

<!-- footer -->

    <footer>

    </footer>

</body>
</html>
