
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="log">
        <p>Login</p>
    </div>
    <br>
    <form action="../php_script/Login.php" method="POST">
    <input type="text" class="input-login" id="log" name="login" value="Логин" required>
    <br>
    <input type="password" class="input-pass" id="pass" name="password" size="10" required>
    <br>
    <input type="submit" class="input-submit" value="Войти">
    </form>
    <br>
    <div class="logpic">
    </div>
    <form>
        <input type="checkbox" class="input-checkbox">
    </form>
</body>

</html>