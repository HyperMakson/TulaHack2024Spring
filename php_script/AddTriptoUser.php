<?
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
if (isset($_POST['active'])) {
    try {
        addTriptoUser((int) $_POST['active'], $_SESSION['user']['id']);
    } catch (Throwable $ex) {
        echo "Ошибка $ex";
    }
    redirect('../index.php');

}