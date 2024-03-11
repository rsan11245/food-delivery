<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../assets/css/auth.css">
</head>
<body>
<div class="center">
    <div class="form">
        <h1>Регистрация</h1>
        <form action="../app/auth/index.php" method="post">
            <div class="txt_field">
                <input type="text" name="phone" id="phone" required>
                <span></span>
                <label for="phone">Телефон</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Пароль</label>
            </div>
            <div class="txt_field">
                <input type="password" name="confirm_password" id="confirm_password" required>
                <span></span>
                <label for="confirm_password">Повторите пароль</label>
            </div>
            <input type="submit" name="registration" value="Регистрация">
            <div class="signup_link">
                <a href="login.php">Войти в существующий аккаунт</a>
            </div>
        </form>

    </div>
</div>
</body>
</html>