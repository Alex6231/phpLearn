<?php
    session_start();
    // "/deleteArticle/2" -> $path = ["", "deleteArticle", "2"] -> if($path[1] == "deleteArticle"){выполняем инструкции удаления статьи}
    // "/reg" -> $path = ["", "reg"] -> if($path[1] == "reg"){открывем страницу регистрации}
    // "/login" -> $path = ["", "login"] -> if($path[1] == "login"){открываем страницу авторизации}
    $requestURI = $_SERVER['REQUEST_URI']; // Получаем URI по которому запрошена страница
    $method = $_SERVER['REQUEST_METHOD']; // Получаем метод запроса
    $path = explode('/', $requestURI); // Разбиваем URI по знаку "/" и получаем массив в переменную
    require_once('php/db.php'); // Запрашиваем переменную mysqli
    require_once('php/classes/UserController.php'); // Запрашиваем класс UserController
    require_once('php/classes/ArticleController.php'); // Запрашиваем класс ArticleController
    if($path[1]=="reg" and $method=="GET"){
        $content = file_get_contents("reg.php"); // Если второй элемент массива равен строке reg и метод запроса get, то отображаем на странице содержимое файла reg.php
    }else if($path[1]=="reg" and $method=="POST"){
        UserController::reg($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['pass']); // Если второй элемент массива равен строке reg и метод запроса post, то передаем post данные в функцию reg класса UserController
    }else if ($path[1]=="login" and $method=="GET"){
        $content = file_get_contents('login.php'); // Если второй элемент массива равен строке login и метод запроса get, то отображаем на странице содержимое файла login.php
    }else if($path[1]=="login" and $method=="POST"){
        UserController::login($_POST['email'], $_POST['pass']); // Если второй элемент массива равен строке login и метод запроса post, то передаем post данные в функцию login класса UserController
    }else if($path[1]=="profile"){
        $content = file_get_contents('profile.php'); // Если второй элемент массива равен строке profile, то отображаем на странице содержимое файла profile.php
    }else if($path[1] == "addArticle" and $method=="GET"){
        $content = file_get_contents('addArticle.php'); // Если второй элемент массива равен строке addArticle и метод запроса get, то отображаем на странице содержимое файла addArticle.php
    }else if($path[1] == "addArticle" and $method=="POST"){
        ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']); // Если второй элемент массива равен строке addArticle и метод запроса post, то передаем post данные в функцию addArticle класса ArticleController
    } else if($path[1] == ""){} // Если второй элемент массива равен пустой строке, то ничего не делаем
    else if($path[1] == "article" and $method=="GET"){
        $content = file_get_contents('article.html'); // Если второй элемент массива равен строке article и метод запроса get, то отображаем на странице содержимое файла article.php
    }else if($path[1] == "article" and $method=="POST"){
        exit(ArticleController::getArticle($path[2])); // Если второй элемент массива равен строке article и метод запроса post, то передаем третий элемент массива (айди) в функцию getArticle класса ArticleController
    }else if($path[1] == "deleteArticle"){ // '/deleteArticle/2'
        ArticleController::deleteArticle($path[2]); exit; // Если второй элемент массива равен строке deleteArticle, то передаем третий элемент массива (айди) в функцию deleteArticle класса ArticleController и заканчиваем выполнение скрипта
    }else if($path[1] == "getUserData"){
        UserController::getUserData(); // Если второй элемент массива равен строке getUserData, то исполняем функцию getUserData класса UserController
    }else if($path[1] == "updateArticle" and $method=="GET"){
        $content = file_get_contents('updateArticle.html'); // Если второй элемент массива равен строке updateArticle и метод запроса get, то отображаем на странице содержимое файла updateArticle.php
    }else if($path[1] == "updateArticle" and $method=="POST"){
        ArticleController::updateArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author']);// Если второй элемент массива равен строке updateArticle и метод запроса post, то передаем post даные в функцию updateArticle класса ArticleController
    }else{
        echo "Страница не найдена 404"; // Во всех остальных случаях выводим сообщение
    }
    require_once('template.php'); // запрашиваем шаблон страницы