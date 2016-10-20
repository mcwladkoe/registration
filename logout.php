<?php

//разлогинивает
unset($_SESSION['session_username']);
session_destroy();
header('Location: index.php?op=log');