<?php require_once 'Helper.php';
require_once "ConnectDB.php";


$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
if (isset($_POST['hobby']) and !empty($_POST['hobby'])) {
    $checkbox_values = $_POST['hobby'];
}

if (!empty($_POST['password']) and !empty($_POST['login']) and !empty($_POST['name'])) {
    addUser($name, $login, md5($password), $checkbox_values);
    $user = selectUser($login, md5($password));
    if (!empty($user)) {
        $_SESSION['user'] = $user;
        redirect('../profile/user.php');
    }

} else {
    redirect('../register.php');
}