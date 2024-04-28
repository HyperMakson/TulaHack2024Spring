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
                <div class="detail-picture">

                    <div class="detail-btn__container">
                        <form action="../php_script/AddReview.php" method="POST">
                            <input type="hidden" name="active" value="<?= $id ?>">
                            <textarea name="review"></textarea>
                            <button type="submit">Оставить отзыв</button>
                        </form>
                        




                    </div>
                </div>
                <div class="detail-info__container">
                    <div class="detail-address">

                    </div>
                    <div class="detail-info">

                    </div>
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