<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once 'php_script/Helper.php';
require_once "php_script/ConnectDB.php";
?>

<body>
    <div class="header">
        <div class="header__navbar">
            <div class="navbar__fast-link">
                <p>Ачивки</p>
            </div>
            <div class="navbar__logo">
                <p>LOGO</p>
            </div>
            <div class="navbar__link">
                <? if (empty($_SESSION['user'])) {
                    ?>
                    <div class="link__logreg">
                        <a href="logreg/login.php">Вход</a>
                    </div>
                    <div class="link__logreg">
                        <a href="logreg/register.php">Регистрация</a>
                    </div>
                <?
                } else {
                    ?>
                    <div class="link__logreg link__profile">
                        <a href="profile/user.php">
                            <div class="link__profile-avatar"></div>
                        </a>
                    </div>
                <?
                } ?>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="main-logo">
            <div class="main-container">
                <div class="main-text__container">
                    <p class="main-text">Поиск туров и попутчиков</p>
                </div>
            </div>
            <div class="history-travel">
                <p>Здесь поиск</p>
            </div>
        </div>
        <div class="main-content">
            <div class="block-news block-news__margin">
                <?php if (!empty($_SESSION['user'])) {
                    var_dump(selectTripforUser($_SESSION['user']['id']));
                } ?>
            </div>
            <div class="block-news">
                <p>Здесь что-нибудь выводить</p>
            </div>
            <div class="block-news">
                <?= var_dump(selectReviews())?>
            </div>
        </div>
    </div>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>