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
        $id = (int) $_POST["active"];
        ?>
        <div class="detail-page__container">
            <div class="detail-main__container">
                <div class="detail-info__container">
                    <form action="../php_script/AddReview.php" method="POST" class="add-review__container">
                        <input type="hidden" name="active" value="<?= $id ?>">
                        <textarea name="review" class="add-review__area"></textarea>
                        <button type="submit" class="add-review__btn">Оставить отзыв</button>
                    </form>
                </div>
            </div>
        </div>
    <?
    } catch (Throwable $ex) {
        echo "Ошибка";
    } ?>



    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>

</body>

</html>