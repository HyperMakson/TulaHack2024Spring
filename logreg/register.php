<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once '../php_script/Helper.php';
chekAuth();
?>

<body>
    <div class="log-form">
        <div class="foto__container">
            <div class="foto">
                ggkfjgjfk
            </div>
        </div>
        <div class="log__container">
            <div class="log__container-for-form">
                <div class="log-name__container">
                    <p class="log-name">Регистрация</p>
                </div>
                <form action="../php_script/Registr.php" method="POST">
                    <div class="login__container">
                        <label for="input-login" class="upper-text__log-form">Имя</label>
                        <input type="text" class="input-fields input-login" id="name" name="name" required>
                    </div>
                    <div class="login__container">
                        <label for="input-login" class="upper-text__log-form">Email</label>
                        <input type="text" class="input-fields input-login" id="log" name="login" required>
                    </div>
                    <div class="login__container">
                        <label for="input-pass" class="upper-text__log-form">Пароль</label>
                        <input type="password" class="input-fields input-pass" id="pass" name="password" required>
                    </div>
                    <div class="login__container">
                        <label for="input-login" class="upper-text__log-form">Фото профиля</label>
                        <input type="text" class="input-fields input-login" id="profile" name="picture" required>
                    </div>
                    <input type="submit" class="input-fields input-submit" value="Зарегистрироваться">
                </form>
                <div class="container-for-link-reg">
                    <p>Есть аккаунт? <a href="login.php" class="link-to-reg">Войти</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>