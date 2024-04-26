<?php require_once 'Helper.php';
require_once "ConnectDB.php"; 


if (!empty($_POST['password']) and !empty($_POST['login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password);
    $user = selectUser($login, $password);
    if (!empty($user)){
        $_SESSION['user'] = $user;
        redirect('../index.php');
    } 
else{
        redirect('/logreg/login.php');

    }

}