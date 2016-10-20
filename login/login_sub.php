<?php

defined('LOGI') OR die('Direct access to the forbidden page!');

$incorLogin = false;
$count = 0;
$timeLast = 0;
$curr = mktime(filter_input(INPUT_SERVER, 'REQUEST_TIME'));
$ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
$incorr = 0;
$db->run("SELECT id FROM users WHERE (login='" . $login . "' OR email='" . $login . "')");
$numRowsLog = $db->num;
if ($numRowsLog) {
    DEFINE('LOGE', '');
    include 'login_exists.php';
} else {
    echo 'User with the username / email is not found. ';
}

