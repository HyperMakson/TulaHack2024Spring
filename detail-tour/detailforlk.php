<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
?>

<body>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header_inner-page.php';
    ?>

    <?
    if (isset($_GET["tour"])) {
        try {
            $id = (int) $_GET["tour"];
            $tour = selectTripbyId($id);
            ?>
            <div class="detail-page__container">
                <div class="detail-name"><?= $tour["name"]; ?></div>
                <div class="detail-main__container">
                    <div class="detail-picture">
                        <img src="<?= $tour["picture"]; ?>" alt="<?= $tour["name"]; ?>">
                        <div class="detail-btn__container">
                            <form method="POST" action="addreview.php">
                                <input type="hidden" name="active" value="<?= $id ?>">
                                <input type="submit" value="Оставить отзыв" class="detail-btn">
                            </form>
                        </div>
                    </div>
                    <div class="detail-info__container">
                        <div class="detail-address">
                            <p><?= $tour["address"]; ?></p>
                        </div>
                        <div class="detail-info">
                            <p><?= $tour["description"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?
        } catch (Throwable $ex) {
            echo "Ошибка";
        } ?>
    <?
    } else {
        ?>
        <div class="detail-page__container">
            <p>Такого тура нет</p>
        </div>
    <?
    }
    ?>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>

</body>

</html>