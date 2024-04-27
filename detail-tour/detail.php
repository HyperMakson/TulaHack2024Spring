<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/header.php';
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
?>

<body>
    <div class="detail-name">Велопрогулки по Карельскому перешейку</div>
    <div class="detail-main__container">
        <div class="detail-picture">
            <img src="../images/main-page/hero.jpg">
        </div>
        <div class="detail-address">
            <p>Адрес</p>
        </div>
        <div class="detail-info">
            <p>Текстовая область</p>
        </div>
        <div class="detail-btn">
            <input type="button" value="Добавить к себе">
        </div>
    </div>
    <?
    require_once $_SERVER["DOCUMENT_ROOT"] . '/include_headfoot/footer.php';
    ?>
</body>

</html>