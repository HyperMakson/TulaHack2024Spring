<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once 'php_script/Helper.php';
require_once "php_script/ConnectDB.php";
?>


<body>
    <div class="header">
        <div class="header__navbar">
            <div class="navbar__fast-link"></div>
            <div class="navbar__logo">
                <img src="../images/logo_new_main.svg">
            </div>
            <div class="navbar__link">
                <? if (empty($_SESSION['user'])) {
                    ?>
                    <div class="link__logreg link__mobile-log">
                        <a href="logreg/login.php">Вход</a>
                    </div>
                    <div class="link__logreg link__mobile-reg">
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
                <div class="search-container">
                    <form id="searchForm" method="GET" class="search-form">
                        <div class="search-line__container">
                            <input type="text" id="search" name="search" placeholder="Введите запрос для поиска"
                                class="search-input">
                            <a href="/" class="search-reset"><img src="/images/resetbtn.svg" alt="Сброс"></a>
                        </div>
                        <button type="submit" class="search-btn">Поиск</button>
                    </form>
                </div>
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
                    <? try {
                        if (isset($_GET['search'])) {
                            $searchValue = $_GET['search'];
                            $results = searchTrip($searchValue);
                            foreach ($results as $result) {
                                $name = $result['name'];
                                $id = $result['id'];
                                $picture = $result["picture"];
                                $address = $result['address']; ?>
                                <div class='block-tour__items'>
                                    <img src='<?= $picture ?>' class='block-tour__picture'>
                                    <div class='block-tour__info-container'>
                                        <a href='/detail-tour/detail.php?tour=<?= $id ?>;'
                                            class="block-tour__info-link"><?= $name ?></a>
                                        <p><?= $address ?></p>
                                    </div>
                                </div>
                            <? }
                        } else { ?>
                            <? if (!empty($_SESSION['user'])) { ?>
                                <?
                                $trip = selectTripforUser($_SESSION['user']['id']);
                                if (!empty($trip)) {
                                    foreach ($trip as $elem) {
                                        ?>
                                        <div class="block-tour__items">
                                            <img src="<?= $elem['picture'] ?>" class="block-tour__picture">
                                            <div class="block-tour__info-container">
                                                <a href="/detail-tour/detail.php?tour=<?= $elem['id']; ?>"
                                                    class="block-tour__info-link"><?= $elem['name'] ?></a>
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
                                                <a href="/detail-tour/detail.php?tour=<?= $elem['id']; ?>"
                                                    class="block-tour__info-link"><?= $elem['name'] ?></a>
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
                                            <a href="/detail-tour/detail.php?tour=<?= $elem['id']; ?>"
                                                class="block-tour__info-link"><?= $elem['name'] ?></a>
                                            <p><?= $elem['address'] ?></p>
                                        </div>
                                    </div>
                                <?
                                }
                                ?>
                            <? } ?>
                        <? } ?>
                    <? } catch (Throwable $ex) {
                        echo "Ошибка $ex";
                    }
                    ?>
                </div>
            </div>
            <div class="block-news">
                <div class="block-news__text-container">
                    <div class="block-news__text">
                        <p>Попутчики</p>
                    </div>
                </div>
                <div class="block-news__info">
                    <? try {
                        if (!empty($_SESSION['user'])) { ?>
                            <? $companions = selectСompanion($_SESSION['user']['id']);
                            if (empty($companions)) { ?>
                                <p> Для вас нет попутчиков</p>
                            <? } else {
                                foreach ($companions as $companion) {
                                    foreach ($companion as $elem) {
                                        ?>
                                        <div class="block-tour__items">
                                            <? if (empty($elem['$picture'])) { ?>
                                                <img src="/images/avatar.svg" class="block-tour__picture">
                                            <? } else { ?>
                                                <img src=" <?= $elem['$picture'] ?>" class="block-tour__picture">
                                            <? } ?>
                                            <div class="block-tour__info-container">
                                                <a href="../php_script/AddCompanion.php?companion=<?= $elem['id'] ?>"
                                                    class="block-tour__info-link">
                                                    <?= $elem['name'] ?>
                                                </a>
                                                <? $count = (countUserTrip($elem['id'])); ?>
                                                <p>Колличество путешествий пользователя: <?= $count['COUNT(id_trip)']; ?>
                                            </div>
                                        </div>
                                    <? } ?>
                                <? } ?>
                            <? } ?>
                        <? } ?>
                    <? } catch (Throwable $ex) {
                        echo "Ошибка $ex";
                    } ?>
                </div>
            </div>
            <div class="block-news block-news__margin-bottom">
                <div class="block-news__text-container">
                    <div class="block-news__text">
                        <p>Отзывы</p>
                    </div>
                </div>
                <div class="block-news__info">
                    <? try {
                        $reviews = selectReviews();
                        foreach ($reviews as $elem) { ?>
                            <div class="block-tour__items">
                                <img src=" <?= $elem['trip_picture'] ?>" class="block-tour__picture">
                                <div class="block-tour__info-container">
                                    <a href="/detail-tour/detailreviews.php?tour=<?= $elem['id'] ?>"
                                        class="block-tour__info-link"><?= $elem['trip_name'] ?></a>
                                    <p><?= $elem['user_name'] ?></p>
                                </div>
                            </div>
                        <? } ?>
                    <? } catch (Throwable $ex) {
                        echo "Ошибка $ex";
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>