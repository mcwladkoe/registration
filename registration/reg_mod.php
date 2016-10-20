<?php

defined('REGI') OR die('Direct access to the forbidden page!');

//Переменная ошибок
$err = false;

//шифруем пароль
$password = md5($password);

//имеет ли логин запрещенные символы
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $login)) {
    $err = true;
    echo 'Login is incorrect. ';
}

//является ли логин почтой
if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $err = true;
    echo 'Invalid login. Login can not contain email. ';
}

//валидность почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err = true;
    echo 'Invalid email. ';
}

//валидность даты
$curr = '';
$bdateArr = explode('-', $bdate);
if (checkdate($bdateArr[1], $bdateArr[2], $bdateArr[0])) {
    $bdate = strtotime($bdate);
    $curr = mktime(filter_input(INPUT_SERVER, 'REQUEST_TIME'));
    if ($bdate > $curr) {
        $err = true;
        echo 'Invalid birth date. ';
    }
} else {
    $err = true;
    echo 'Invalid date. ';
}

//проверка, существуют ли пользователи с таким логином и/или почтой
$db->run("SELECT * FROM users WHERE login='" . $login . "'");
$numRowsLog = $db->num;

//если такой логин уже существует
if ($numRowsLog != 0) {
    $err = true;
    echo 'User with this login is already exists. ';
}

$db->run("SELECT * FROM users WHERE email='" . $email . "'");
$numRowsEm = $db->num;

//если такой адрес почты уже существует
if ($numRowsEm != 0) {
    $err = true;
    echo 'User with this email is already exists. ';
}

//если ошибок не было
if (!$err) {
    $bdate = date('Y-m-d', $bdate);
    $sql = "INSERT INTO users (login, email, real_name,password, birth_date, country_id, timestamp)
            VALUES('$login','$email', '$realName', '$password', '$bdate', '$country_id', '$curr')";
    $db->run($sql);
    $db->stop();
    $_SESSION['session_username'] = $login;
    header('Location: index.php?op=intr');
}