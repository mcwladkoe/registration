<?php

//главный контроллер
session_start();
//подключаемся к бд
require_once(__DIR__ . "/cfg/core.php");
$db = new MyDB();
$db->connect();

// Получаем параметр op из URL
$op = filter_input(INPUT_GET, 'op');
// проверка на текущую сессию
if ($op != 'logout' && $_SESSION['session_username'] != '') {
    $op = 'intr';
}

switch ($op) {
    case 'log':
        define("LOG", "");
        include __DIR__ . '/login/log.php';
        include __DIR__ . '/login/login.php';
        break;
    case 'intr':
        define("INT", "");
        include __DIR__ . '/intro/intro_sub.php';
        include __DIR__ . '/intro/intro.php';
        break;
    case 'logout':
        include 'logout.php';
        break;
    case 'reg':
        define("REG", "");
        include __DIR__ . '/registration/countries.php';
        include __DIR__ . '/registration/registration.php';
        include __DIR__ . '/registration/reg.php';
        break;
    default:
        define("LOG", "");
        include __DIR__ . '/login/log.php';
        include __DIR__ . '/login/login.php';
        break;
} 