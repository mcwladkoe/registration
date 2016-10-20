<?php

defined('LOGE') OR die('Direct access to the forbidden page!');

$db->row();
$id = $db->data['id'];
//немного защиты от брутфорса
$db->run("SELECT time_last, count FROM invalid_sessions WHERE user_id = ( SELECT id FROM users WHERE login='" . $login . "') AND ip='" . $ip . "'");
$incorr = $db->num;
if ($incorr) {
    $db->row();
    $count = $db->data['count'];
    $timeLast = $db->data['time_last'];
}

//шифрование пароля 
$password = md5($password);

//проверка, существуют ли пользователи с таким логином и/или почтой и паролем
$db->run("SELECT * FROM users WHERE id='" . $id . "' AND password='" . $password . "'");
$numRows = $db->num;
//если существует и пароль правильный - создаем новую сессию
if ($numRows) {
    //если удачно залогинился - удаляем из базы
    if ($incorr) {
        $db->run("DELETE FROM invalid_sessions WHERE user_id = '" . $id . ", ip='" . $ip . "';");
    }
    $_SESSION['session_username'] = $login;
    header('Location: index.php?op=intr');
} else {
    echo 'Invalid username / email and password.';
    if ($incorr) {
        DEFINE('INCORR','');
        include 'blocked_login.php';
        $count++;
        $db->run("UPDATE invalid_sessions SET time_last='" . $curr . "', count='" . $count . "' WHERE user_id = ( SELECT id FROM users WHERE login='" . $login . "') AND ip='" . $ip . "'");
    } else {
        $db->run("INSERT INTO invalid_sessions (user_id, ip, time_last, count) VALUES ('" . $id . "','" . $ip . "', '" . $curr . "', 1)");
    }
}

