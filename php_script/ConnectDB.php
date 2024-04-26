<?php
$host = 'localhost';
$dbname = 'DB_TulaHack';
$dbuser = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $password);   
} catch(PDOException $exception){
    echo "Error:". $exception->getMessage();}

    function selectUser(string $userLogin, string $userPassword){
        global $pdo;
        $sql = "SELECT  name, email, picture FROM user WHERE email = :userLogin AND password = :userPassword";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['userLogin' => $userLogin, 'userPassword'=> $userPassword]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function addUser(string $userName, string $userLogin, string $userPassword, string $userPicture){
        global $pdo;
        $sql = "INSERT user (name, email, password, picture) VALUES (:userName, :userLogin, :userPassword,  :userPicture)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['userName' => $userName,'userLogin' => $userLogin, 'userPassword'=> $userPassword, 'userPicture' => $userPicture]);
    }
