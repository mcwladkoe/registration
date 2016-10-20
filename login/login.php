<?php
defined('LOG') OR die('Direct access to the forbidden page!');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>LogPage</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    </head>

    <body>
        <h1>LOG IN</h1>
        <form action="index.php?op=log" method="post" name="logform" id="logform">
            <p>
                <label for="login">
                    Login\email:<input id="login" type="text" maxlength="32" name="login" value="<?= $login ?>" required>
                </label>
            </p>
            <p>
                <label for="password">
                    Password:<input id="password" type="password" maxlength="32" pattern="[A-Za-z0-9_-]{8,32}" name="password" required>
                </label>
            </p>
            <p>
                <input name="log_in" type="submit" value="Log In">
            </p>
            <p>Not a Member? <a href="index.php?op=reg">Sign up</a></p>
        </form>
    </body>

</html>
