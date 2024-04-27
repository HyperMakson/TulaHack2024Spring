<?php
$host = 'localhost';
$dbname = 'DB_TulaHack';
$dbuser = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $password);
} catch (PDOException $exception) {
    echo "Error:" . $exception->getMessage();
}

function selectUser(string $userLogin, string $userPassword)
{
    global $pdo;
    $sql = "SELECT  id, name, email, picture FROM user WHERE email = :userLogin AND password = :userPassword";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userLogin' => $userLogin, 'userPassword' => $userPassword]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addUser(string $userName, string $userLogin, string $userPassword, string $userPicture)
{
    global $pdo;
    $sql = "INSERT user (name, email, password, picture) VALUES (:userName, :userLogin, :userPassword,  :userPicture)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['userName' => $userName, 'userLogin' => $userLogin, 'userPassword' => $userPassword, 'userPicture' => $userPicture]);
}
function selectTripforUser(int $userId)
{
    global $pdo;
    $sql = "SELECT th.id_trip FROM trip_hobby th JOIN user_hobby uh ON th.id_hobby = uh.id_hobby WHERE uh.id_user = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    $arr_id_trip = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($arr_id_trip as $row) {
        $trip_id[] = $row['id_trip'];
    }
    ;
    if (isset($trip_id)) {
        foreach ($trip_id as $trip) {
            $sql = "SELECT * FROM trip WHERE id = :tripId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['tripId' => $trip]);
            $trip = $stmt->fetch(PDO::FETCH_ASSOC);
            $trips[] = $trip;
        }
        return $trips;} 
}

function selectReviews(){
    global $pdo;
    $sql = "SELECT u.name AS user_name, t.name AS trip_name, r.text AS review_text FROM user u JOIN reviews r ON u.id = r.id_user JOIN trip t ON r.id_trip = t.id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function selectTrip(){
    global $pdo;
    $sql = "SELECT * FROM trip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectСompanion($userId){
global $pdo;
/*$sql = "SELECT * FROM companions WHERE id_user != :userId AND id_companion != :userId";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userId' => $userId]);
return $stmt->fetchAll(PDO::FETCH_ASSOC);*/
$sql = "SELECT id_trip FROM user_history WHERE id_user = :userId";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userId' => $userId]);
$arr_id_trip = $stmt->fetch(PDO::FETCH_ASSOC);

}
