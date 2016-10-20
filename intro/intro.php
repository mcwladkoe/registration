<?php
defined('INT') OR die('Direct access to the forbidden page!');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Your Page</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    </head>

    <body>
        <h2>Welcome,
            <?= $username ?>!
        </h2>
        <p>Your email:
            <?= $email ?>
        </p>
        <p><a href="index.php?op=logout">Log out</a></p>
    </body>

</html>