<?php

defined('INCORR') OR die('Direct access to the forbidden page!');

if ($count > 4 && $count < 20) {
    $incorLogin = true;
    $blockTime = 5 + ($count - 5) * 2;
    $wait = $curr - $timeLast - $blockTime;
    if ($wait < $blockTime && $wait < 0) {
        echo $count;
        echo 'Your account has been suspended for ' . $blockTime . ' seconds. Wait ' . $wait . 'seconds.';
        exit;
    }
}
if ($count > 20) {
    $incorLogin = true;
    echo 'Your ip address is blocked.  ';
}