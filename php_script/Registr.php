<?php require_once 'Helper.php';
require_once "ConnectDB.php";


$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$picture = $_POST['picture'];

if (!empty($_POST['password']) and !empty($_POST['login']) and !empty($_POST['name'])) {
    addUser($name, $login, md5($password), $picture);
    redirect('/TulaHack2024Spring/login.php');
} else {
    redirect('/TulaHack2024Spring//Registr.php');
}
