<?
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
if (isset($_POST['active'])) {
    try {
        addReviews($_SESSION['user']['id'], (int) $_POST['active'], $_POST['review']);
    } catch (Throwable $ex) {
        echo "Ошибка $ex";
    }
    redirect('../index.php');

}