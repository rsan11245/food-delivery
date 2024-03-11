<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link rel="stylesheet" href="../assets/css/auth.css">
</head>
<body>
<div class="center">
    <div class="form">
        <h1>Вход</h1>
        <form action="../app/auth/index.php" method="post" id="login-form">
            <div class="txt_field">

                <input type="tel" name="phone" id="phone" required>
                <span></span>
                <p class="input-error"></p>
                <label for="phone">Телефон</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <p class="input-error"></p>
                <label for="password">Пароль</label>
            </div>
            <input type="submit" name="login" value="Войти">
            <div class="signup_link">
                <a href="register.php">Регистрация</a>
            </div>
        </form>

    </div>
</div>

<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/auth.js"></script>
</body>
</html>