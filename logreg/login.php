<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once '../php_script/Helper.php';
chekAuth();
?>

<body>
    <div class="log-form">
        <div class="log__container">
            <div class="log__container-for-form">
                <div class="log-name__container">
                    <p class="log-name">Вход</p>
                </div>
                <form action="../php_script/Login.php" method="POST" class="form-log">
                    <div class="login__container">
                        <label for="input-login" class="upper-text__log-form">Email</label>
                        <input type="text" class="input-fields input-login" id="log" name="login" required>
                    </div>
                    <div class="login__container">
                        <label for="input-pass" class="upper-text__log-form">Пароль</label>
                        <input type="password" class="input-fields input-pass" id="pass" name="password" required>
                    </div>
                    <input type="submit" class="input-fields input-submit" value="Войти">
                </form>
                <div class="container-for-link-reg">
                    <p>Нет аккаунта? <a href="register.php" class="link-to-reg">Зарегистрироваться</a></p>
                </div>
            </div>
        </div>
        <div class="foto__container">
            <div class="foto">
                <div class="swiper-container">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="../images/slider/img_slider1.jpg" alt="Slide" class="img-slider">
                            </div>
                            <div class="swiper-slide">
                                <img src="../images/slider/img_slider2.jpg" alt="Slide" class="img-slider">
                            </div>
                            <div class="swiper-slide">
                                <img src="../images/slider/img_slider1.jpg" alt="Slide" class="img-slider">
                            </div>
                            ...
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script_logreg.js"></script>
</body>

</html>