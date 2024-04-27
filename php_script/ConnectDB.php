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
    $sql = "SELECT  id, name, email FROM user WHERE email = :userLogin AND password = :userPassword";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userLogin' => $userLogin, 'userPassword' => $userPassword]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addUser(string $userName, string $userLogin, string $userPassword, array $checkbox_values)
{
    global $pdo;
    $sql = "INSERT user (name, email, password) VALUES (:userName, :userLogin, :userPassword)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userName' => $userName, 'userLogin' => $userLogin, 'userPassword' => $userPassword]);
    $sql = "SELECT  id FROM user WHERE email = :userLogin AND password = :userPassword";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userLogin' => $userLogin, 'userPassword' => $userPassword]);
    $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach ($checkbox_values as $value) {
    $sql = "INSERT INTO `user_hobby`(`id_user`, `id_hobby`) VALUES (:userId,:hobbyId)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["userId"=> $user_id['id'], "hobbyId" => $value]);
    }
    return 1;

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
    };
    if (isset($trip_id)) {
        foreach ($trip_id as $trip) {
            $sql = "SELECT * FROM trip WHERE id = :tripId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['tripId' => $trip]);
            $trip = $stmt->fetch(PDO::FETCH_ASSOC);
            $trips[] = $trip;
        }
        return $trips;
    }
}

function selectReviews()
{
    global $pdo;
    $sql = "SELECT u.name AS user_name, t.name AS trip_name, r.text AS review_text FROM user u JOIN reviews r ON u.id = r.id_user JOIN trip t ON r.id_trip = t.id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectTrip()
{
    global $pdo;
    $sql = "SELECT * FROM trip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectСompanion($userId)
{
    global $pdo;
    /*$sql = "SELECT * FROM companions WHERE id_user != :userId AND id_companion != :userId";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userId' => $userId]);
return $stmt->fetchAll(PDO::FETCH_ASSOC);*/
    $sql = "SELECT id_trip FROM user_history WHERE id_user = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    $arr_id_trip = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arr_id_trip as $row) {
        $trip_id[] = $row['id_trip'];
    }
    if (isset($trip_id)) {
        foreach ($trip_id as $trip) {
            $sql = "SELECT id_user FROM user_history WHERE id_trip = :tripId AND id_user != :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['tripId' => $trip, 'userId' => $userId]);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users[] = $user;
        }
        $flatArray = array_reduce($users, function ($carry, $item) {
            foreach ($item as $subItem) {
                $carry[] = $subItem['id_user'];
            }
            return $carry;
        }, []);
        $uniqueArray = array_unique($flatArray);
        foreach ($uniqueArray as $item) {
            $sql = "SELECT name, email, picture FROM user WHERE id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['userId' => $item]);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users[] = $user;
            return $users;
        }
    }
}
function selectHobbys()
{
    global $pdo;
    $sql = 'SELECT * FROM hobbies';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectTripbyId(int $tripId)
{
    global $pdo;
    $sql = "SELECT * FROM trip WHERE id = :tripId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["tripId"=> $tripId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}