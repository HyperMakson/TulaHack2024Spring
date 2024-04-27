<?
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
if (isset($_POST['active'])){
    addTriptoUser((int)$_POST['active'], $_SESSION['user']['id']);
}