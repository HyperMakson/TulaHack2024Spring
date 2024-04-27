<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once '../php_script/Helper.php';
chekNotAuth();
?>

<body>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header_inner-page.php';
    ?>

    <div class="center">
        <!-- Цветной прямоугольник и фотка -->

        <div class="middle-rectangle">
        </div>
        <div class="middle-profile_photo">
            <img src="images/profile-photo-big.png">
            <span class="middle-profile_photo-span-name"><?= $_SESSION['user']['name'] ?></span><br>
            <span class="middle-profile_photo-span-email"><?= $_SESSION['user']['email'] ?></span></br>
        </div>


        <!-- Навигация внутри профиля -->
        <div class="navprofile-container">
            <a class="navprofile-container-account" href="#">Аккаунт</a>
            <a class="navprofile-container-history" href="#">История</a>
            <a class="navprofile-container-payment" href="#">Методы оплаты</a>
        </div>

        <!-- Основные данные аккаунта -->
        <div class="account-container">
            <h1>Аккаунт</h1>
            <div class="account-container-inform">
                <div class="account-name">
                    <h2>Имя</h2>
                    <span><?= $_SESSION['user']['name'] ?></span>
                </div>
                <div class="account-email">
                    <h2>Email</h2>
                    <span><?= $_SESSION['user']['email'] ?></span>
                </div>
                <div class="account-password">
                    <h2>Пароль</h2>
                    <span>*********</span>
                </div>
                <div class="account-phone_number">
                    <h2>Номер телефона</h2>
                    <span>+79539527523</span>
                </div>
                <div class="account-adress">
                    <h2>Адрес</h2>
                    <span>Россия, Тульская обл. г.Тула ул.Свободы д.35</span>
                </div>
                <div class="account-birth">
                    <h2>Дата рождения</h2>
                    <span>14.07.2003</span>
                </div>
                <div>
                    <a href="../php_script/Exit.php">Выйти</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Навигация снизу -->
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>