<?php
    session_start();
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Профиль</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <!-- Начало меню -->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Навбар</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Главная</a>
                        </li>
                    </ul>
                    <?php if($_SESSION['id']): ?>
                        <a href="/exit.php" class="btn btn-success">Выход</a>
                    <?php else: ?>
                        <a href="/reg.html" class="btn btn-success me-3">Регистрация</a>
                        <a href="/login.html" class="btn btn-success">Войти</a>
                    <?php endif;?>
                </div>
            </div>
        </nav>

        <!-- Конец меню -->
        <div class="container">
            <p>Имя: <?= $_SESSION['name']; ?></p>
            <p>Фамиля: <?= $_SESSION['lastname'] ?></p>
            <p>Email: <?= $_SESSION['email'] ?></p>
            <p>ID: <?= $_SESSION['id'] ?></p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>