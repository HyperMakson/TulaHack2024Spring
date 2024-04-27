<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
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
            <img src="../images/profile/profile-photo-big.png">
            <span class="middle-profile_photo-span-name"><?= $_SESSION['user']['name'] ?></span><br>
            <span class="middle-profile_photo-span-email"><?= $_SESSION['user']['email'] ?></span></br>
        </div>


        <!-- Навигация внутри профиля -->
        <div class="navprofile-container">
            <a class="navprofile-container-account" href="?sect=account">Аккаунт</a>
            <a class="navprofile-container-history" href="?sect=history">История</a>
            <a class="navprofile-container-payment" href="?sect=reviews">Ваши отзывы</a>
        </div>

        <!-- Основные данные аккаунта -->
        <?
        if (isset($_GET['sect']) and $_GET['sect'] === "reviews") {
            ?>
            <div class="account-container">
                <h1>Ваши отзывы</h1>
                <div class="account-container-inform">
                    <div class="account-field">
                        <h2>Имя</h2>
                        <span><?= $_SESSION['user']['name'] ?></span>
                    </div>
                </div>
            </div>
        <?
        } elseif (isset($_GET['sect']) and $_GET['sect'] === "history") {
            ?>
            <div class="account-container">
                <h1>История</h1>
                <div class="account-container-inform">
                    <div class="account-field">
                    <?
                            $trip = selectTriptoUser($_SESSION['user']['id']);
                            if (!empty($trip)) {
                                foreach ($trip as $elem) {
                                    ?>
                                    <div class="block-tour__items">
                                        <img src="<?= $elem['picture'] ?>" class="block-tour__picture">
                                        <div class="block-tour__info-container">
                                            <a href="/detail-tour/detailforlk.php?tour=<?= $elem['id']; ?>"><?= $elem['name'] ?></a>
                                            <p><?= $elem['address'] ?></p>
                                        </div>
                                    </div>
                                <?
                                }}?>
                    
                        
                    </div>
                </div>
            </div>
        <?
        } else {
            ?>
            <div class="account-container">
                <h1>Аккаунт</h1>
                <div class="account-container-inform">
                    <div class="account-field">
                        <h2>Имя</h2>
                        <span><?= $_SESSION['user']['name'] ?></span>
                    </div>
                    <div class="account-field">
                        <h2>Email</h2>
                        <span><?= $_SESSION['user']['email'] ?></span>
                    </div>
                    <div class="account-field">
                        <h2>Пароль</h2>
                        <span>*********</span>
                    </div>
                    <div class="account-field">
                        <h2>Номер телефона</h2>
                        <span>+79539527523</span>
                    </div>
                    <div class="account-field">
                        <h2>Адрес</h2>
                        <span>Россия, Тульская обл. г.Тула ул.Свободы д.35</span>
                    </div>
                    <div class="account-field">
                        <h2>Дата рождения</h2>
                        <span>14.07.2003</span>
                    </div>
                    <div class="account-field">
                        <a href="../php_script/Exit.php" class="profile__link-logout">Выйти</a>
                    </div>
                </div>
            </div>
        <?
        }
        ?>
    </div>

    <!-- Навигация снизу -->
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>