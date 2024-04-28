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
    try {
        if (isset($_GET["tour"])) {
            $id = (int) $_GET["tour"];
            $tour = selectTripbyId($id);
            ?>
            <div class="detail-page__container">
                <div class="detail-name"><?= $tour["name"]; ?></div>
                <div class="detail-main__container">
                    <div class="detail-picture">
                        <img src="<?= $tour["picture"]; ?>" alt="<?= $tour["name"]; ?>">
                    </div>
                    <div class="detail-info__container">
                        <div class="detail-address">
                            <p><?= $tour["address"]; ?></p>
                        </div>
                        <div class="detail-btn">
                            <form method="POST" action="../php_script/Addreviews.php">
                                <input type="hidden" name="active" value="<?= $id ?>">
                                <input type="submit" value="Оставить коментарий">
                            </form>
                        <? } ?>
                    </div>
                    <div class="detail-info">
                        <p><?= $tour["description"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <? } catch (Throwable $ex) {
        echo "Ошибка";
    } ?>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>

</body>

</html>