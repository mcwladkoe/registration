<?php defined('REG') OR die('Direct access to the forbidden page!');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>RegPage</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    </head>

    <body>
        <h1>Registration</h1>
        <form action="index.php?op=reg" method="post" name="regform" id="regform">
            <p>
                <label for="login">
                    Login:<input id="login" type="text" maxlength="12" name="login" value="<?= $login; ?>" required>
                </label>
            </p>
            <p>
                <label for="email">
                    E-mail:<input id="email" type="email" maxlength="32" name="email" value="<?= $email; ?>" required>
                </label>
            </p>
            <p>
                <label for="real_name">
                    Real Name:<input id="real_name" type="text" maxlength="20" name="real_name" value="<?= $realName ?>" required>
                </label>
            </p>
            <p>
                <label for="password">
                    Password:<input id="password" type="password" maxlength="32" name="password" pattern="[A-Za-z0-9_-]{8,32}" required>
                </label>
            </p>
            <p>
                <label for="bdate">
                    Birth date:<input id="bdate" type="date" name="birth_date" placeholder="mm-dd-yyyy" min="1900-01-01" value="<?= date('Y-m-d', $bdate); ?>" required>
                </label>
            </p>
            <p>
                <label for="country">
                    Country:<select id="country" name="country">
                        <?= $text; ?>
                    </select>
                </label>
            </p>
            <p>
                <label for="checkb">
                    <input id="checkb" name="checkb" type="checkbox" <?= $checkb ?>value="true" required/>
                    Agree with terms and conditions
                </label>
            </p>
            <p>
                <input name="register" type="submit" value="Create account">
            </p>
            <p>
                Already a Member? <a href="index.php?op=log">Sign in</a>.
            </p>
        </form>
    </body>

</html>
