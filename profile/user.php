<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
?>

<body>
    <header>
        <!-- Навигация сверху -->
        <div class="navbar">
            <nav>
                <a class="navbar-airplane" href="#">
                    <img src="../images/profile/airplane.svg" alt="">
                    <span>Найти транспорт</span>
                </a>
                <a class="navbar-sleep" href="#">
                    <img src="../images/profile/bed.svg">
                    <span>Найти отель</span>
                </a>
                <a class="navbar-logo" href="#">
                    <img src="../images/profile/logo.svg">
                </a>
                <a class="navbar-favourites" href="#">
                    <img src="../images/profile/like.svg">
                    <span>Избранное</span>
                </a>
                <a class="navbar-profile" href="#">
                    <img src="../images/profile/profile-photo.png">
                    <span>Максим</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Цветной прямоугольник и фотка -->
    <div class="middle-container">
        <div class="middle-rectangle">
        </div>
        <div class="middle-profile_photo">
            <img src="../images/profile/profile-photo-big.png">
            <span>Максим</span>
            <span>maxim@gmail.com</span>
        </div>
    </div>

    <!-- Навигация внутри профиля -->
    <div class="navprofile-container">
        <a href="#">Аккаунт</a>
        <a href="#">История</a>
        <a href="#">Методы оплаты</a>
    </div>

    <!-- Основные данные аккаунта -->
    <div class="account-container">
        <h1>Аккаунт</h1>
        <div class="account-name">
            <h2>Имя</h2>
            <span>Максим Варов</span>
        </div>
        <div class="account-email">
            <h2>Email</h2>
            <span>maxim@gmail.com</span>
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
    </div>

    <!-- Навигация снизу -->
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>