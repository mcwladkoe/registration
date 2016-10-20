<?php

defined('REG') OR die('Direct access to the forbidden page!');
$bdate = mktime(filter_input(INPUT_SERVER, 'REQUEST_TIME'));
$login = $email = $realName = $password = $checkb = ''; // обнуляем переменные
//валидатор формы
if (filter_input(INPUT_POST, 'register')) {
    //для заполнения чекбокса
    $cb = filter_input(INPUT_POST, 'checkb');
    if ($cb) {
        $checkb = 'checked ';
    }

    //считывания из формы
    $login = $db->clean(substr(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING), 0, 12));
    $email = $db->clean(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $realName = $db->clean(filter_input(INPUT_POST, 'real_name', FILTER_SANITIZE_STRING));
    $password = $db->clean(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $bdate = $db->clean(filter_input(INPUT_POST, 'birth_date'));
    $country_id = $db->clean(substr(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_NUMBER_INT), 0, 3));

    //проверка, все данные введены или нет
    if (strlen($login) < 2 || strlen($email) > 32 || strlen($email) < 5 || strlen($realName) > 20 || strlen($password) < 8 || $cb == null || $bdate == null || $country_id < 0) {
        echo 'You must enter all the data. ';
    } else {
        DEFINE('REGI', '');
        include 'reg_mod.php';
    }
}
$db->stop();
