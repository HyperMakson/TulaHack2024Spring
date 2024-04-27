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
                <input type="text" id="search" name="search_name">
                <input type="submit" value="Найти">
            </div>
        </div>
        <div class="main-content">
            <div class="block-news block-news__margin">
                <div class="block-news__text-container">
                    <div class="block-news__text">
                        <p>Путешествия</p>
                    </div>
                </div>
                <div class="block-news__info">
                    <? if (!empty($_SESSION['user'])) { ?>
                        <?
                        $trip = selectTripforUser($_SESSION['user']['id']);
                        if (!empty($trip)) {
                            foreach ($trip as $elem) {
                                ?>
                                <div class="block-tour__items">
                                    <img src="<?= $elem['picture'] ?>" class="block-tour__picture">
                                    <div class="block-tour__info-container">
                                        <a href="/detail-tour/detail.php?tour=<?= $elem['id']; ?>"><?= $elem['name'] ?></a>
                                        <p><?= $elem['address'] ?></p>
                                    </div>
                                </div>
                            <?
                            }
                        } else {
                            $trip = selectTrip();
                            foreach ($trip as $elem) {
                                ?>
                                <div class="block-tour__items">
                                    <img src="<?= $elem['picture'] ?>" class="block-tour__picture">
                                    <div class="block-tour__info-container">
                                        <a href="/detail-tour/detail.php?tour=<?= $elem['id']; ?>"><?= $elem['name'] ?></a>
                                        <p><?= $elem['address'] ?></p>
                                    </div>
                                </div>
                            <? }
                        } ?>
                    <? } else {
                        $trip = selectTrip();
                        foreach ($trip as $elem) {
                            ?>
                            <div class="block-tour__items">
                                <img src="<?= $elem['picture'] ?>" class="block-tour__picture">
                                <div class="block-tour__info-container">
                                    <a href="/detail-tour/detail.php?tour=<?= $elem['id']; ?>"><?= $elem['name'] ?></a>
                                    <p><?= $elem['address'] ?></p>
                                </div>
                            </div>
                        <?
                        }
                        ?>
                    <? } ?>
                </div>
            </div>
            <div class="block-news block-news__height">
                <? if (!empty($_SESSION['user'])) { ?>
                    <?= var_dump(selectСompanion($_SESSION['user']['id'])) ?>
                <? } ?>
            </div>
            <div class="block-news block-news__height">
                <?= var_dump(selectReviews()) ?>
            </div>
        </div>
    </div>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>