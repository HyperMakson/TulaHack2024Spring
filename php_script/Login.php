<?php require_once 'Helper.php';
require_once "ConnectDB.php";

try {
    if (!empty($_POST['password']) and !empty($_POST['login'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password = md5($password);
        $user = selectUser($login, $password);
        if (!empty($user)) {
            $_SESSION['user'] = $user;
            redirect('../profile/user.php');
        } else {
            redirect('/logreg/login.php');
        }

    }
} catch (Throwable $ex) {
    echo "Ошибка $ex";
}