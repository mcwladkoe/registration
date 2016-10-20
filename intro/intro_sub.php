<?php

defined('INT') OR die('Direct access to the forbidden page!');
//считываем данные о сессии
$login = $_SESSION['session_username'];

$db->run("SELECT login, email FROM users WHERE login='" . $login . "' OR email='" . $login . "'");
$db->row();

//задаем переменные для вывода
$username = $db->data['login'];
$email = $db->data['email'];

$db->stop();
?>