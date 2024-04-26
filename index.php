<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
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
                <div class="link__log">
                    <a href="">Вход</a>
                </div>
                <div class="link__reg">
                    <a href="">Регистрация</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="main-logo">
            <div class="main-container">
                <div class="main-text__container">
                    <p class="main-text">Личный кабинет туриста</p>
                </div>
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
    <script src="scripts/script.js"></script>
</body>

</html>