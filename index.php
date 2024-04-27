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
                <?php if (empty($_SESSION['user'])) {
                    echo '
                <div class="link__log">
                    <a href="logreg/login.php">Вход</a>
                </div>
                <div class="link__reg">
                    <a href="logreg/register.php">Регистрация</a>
                </div>';
                } else {
                    echo '<a href="php_script/Exit.php">Выход</a>';
                } ?>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="main-logo">
            <div class="main-container">
                <?php if (!empty($_SESSION['user'])) {
                    echo '
                <div class="main-text__container">
                    <a href="profile/user.php"><p class="main-text">Личный кабинет туриста</p></a>
                </div>';
                } ?>
            </div>
            <div class="history-travel">
                <p>Здесь поиск</p>
            </div>
        </div>
        <div class="main-content">
            <div class="block-news block-news__margin">
                <p>Здесь выводит туры</p>
            </div>
            <div class="block-news">
                <p>Здесь что-нибудь выводить</p>
            </div>
            <div class="block-news">
                <p>Здесь отзывы</p>
            </div>
        </div>
    </div>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>