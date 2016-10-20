<?php

defined('LOG') OR die('Direct access to the forbidden page!');

$login = '';
//валидатор формы
if (filter_input(INPUT_POST, 'log_in')) {

    //считывание данных
    $login = $db->clean(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
    $password = $db->clean(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    //проверка правильности ввода
    if (strlen($login) < 2 || strlen($login) > 32 || strlen($password) < 8) {
        echo 'Incorrect data input. ';
    } else {
        DEFINE('LOGI','');
        include 'login_sub.php';
    }
}