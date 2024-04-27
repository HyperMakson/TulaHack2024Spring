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
                        <input type="button" value="Добавить к себе">
                    </div>
                    <div class="detail-info">
                        <p><?= $tour["description"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
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