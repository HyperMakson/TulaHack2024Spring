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
            $tour = selectReviewsbyId($id);
            ?>
            <div class="detail-page__container">
                <div class="detail-main__container">
                    <div class="detail-info__container detail-info__container-review">
                        <img src="<?= $tour["picture"]; ?>" alt="<?= $tour["name"]; ?>">
                        <div class="detail-info__container-review-text">
                            <p class="review-block__name"><?= $tour['name'] ?></p>
                            <p class="review-block__text-review"><?= $tour['text'] ?></p>
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