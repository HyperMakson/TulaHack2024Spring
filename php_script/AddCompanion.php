<?
require_once '../php_script/Helper.php';
require_once "../php_script/ConnectDB.php";
if (isset($_GET['companion'])){
    addCompanion($_SESSION['user']['id'], (int)$_GET['companion']);
    redirect('../index.php');}