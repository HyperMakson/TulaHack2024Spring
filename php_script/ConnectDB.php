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

function selectUser($userLogin, $userPassword)
{
    global $pdo;
    $sql = "SELECT  id, name, email, link FROM user WHERE email = :userLogin AND password = :userPassword";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userLogin' => $userLogin, 'userPassword' => $userPassword]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addUser($userName, $userLogin, $userPassword, $checkbox_values, $link)
{
    global $pdo;
    $sql = "INSERT user (name, email, password, link) VALUES (:userName, :userLogin, :userPassword, :link)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userName' => $userName, 'userLogin' => $userLogin, 'userPassword' => $userPassword, 'link' => $link]);
    $sql = "SELECT  id FROM user WHERE email = :userLogin AND password = :userPassword";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userLogin' => $userLogin, 'userPassword' => $userPassword]);
    $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach ($checkbox_values as $value) {
        $sql = "INSERT INTO `user_hobby`(`id_user`, `id_hobby`) VALUES (:userId,:hobbyId)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["userId" => $user_id['id'], "hobbyId" => $value]);
    }
    return 1;
}
function selectTripforUser($userId)
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
        return $trips;
    }
}

function selectReviews()
{
    global $pdo;
    $sql = "SELECT u.name AS user_name, t.name AS trip_name, r.text AS review_text, t.picture AS trip_picture, r.id AS id FROM user u JOIN reviews r ON u.id = r.id_user JOIN trip t ON r.id_trip = t.id;";
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
    $mass = [];
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
        if (isset($users)) {
            $sql = 'SELECT u.id FROM user u LEFT JOIN companions c1 ON u.id = c1.id_user AND c1.id_companion = :userId LEFT JOIN companions c2 ON u.id = c2.id_companion AND c2.id_user = :userId WHERE c1.id_companion IS NULL AND c2.id_user IS NULL AND u.id != :userId';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['userId' => $userId]);
            $companions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $intersectedIds = array();

        foreach ($companions as $item1) {
            foreach ($users as $subArray) {
                foreach ($subArray as $item2) {
                    if ($item1['id'] == $item2['id_user'] && !in_array($item1['id'], $intersectedIds)) {
                        $intersectedIds[] = $item1['id'];
                    }
                }
            }
        }

        foreach ($intersectedIds as $elem) {

            $sql = 'SELECT id, name, email, picture FROM user WHERE id = :userId';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['userId' => $elem]);
            $mas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $mass[] = $mas;


        }

    }
    return $mass;
}
function selectHobbys()
{
    global $pdo;
    $sql = 'SELECT * FROM hobbies';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectTripbyId($tripId)
{
    global $pdo;
    $sql = "SELECT * FROM trip WHERE id = :tripId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["tripId" => $tripId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function searchTrip($string)
{
    global $pdo;
    $sql = "SELECT * FROM trip WHERE name LIKE '%$string%'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTriptoUser($tripId, $userId)
{
    global $pdo;
    $sql = "SELECT * FROM user_history WHERE id_user = :userId AND id_trip = :tripId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["tripId" => $tripId, "userId" => $userId]);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($res)) {
        $sql = "INSERT INTO user_history (`id_user`, `id_trip`) VALUES (:userId, :tripId)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(["tripId" => $tripId, "userId" => $userId]);
    }
}

function selectTriptoUser($userId)
{
    global $pdo;
    $sql = "SELECT id_trip FROM user_history WHERE id_user = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["userId" => $userId]);
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $trips = [];
    foreach ($res as $item) {
        $sql = "SELECT * FROM trip WHERE id = :tripId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['tripId' => $item['id_trip']]);
        $trip = $stmt->fetch(PDO::FETCH_ASSOC);
        $trips[] = $trip;
    }
    return $trips;
}
function addReviews($userId, $tripId, $text)
{
    global $pdo;
    $sql = 'INSERT INTO reviews (id_user, id_trip, text) VALUES (:userId, :tripId, :text)';
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['userId' => $userId, 'tripId' => $tripId, 'text' => $text]);
}

function selectReviewsbyUser($userId)
{
    global $pdo;
    $sql = 'SELECT trip.name, reviews.text, trip.picture FROM trip JOIN reviews ON trip.id = reviews.id_trip WHERE reviews.id_user = :userId';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function countUserTrip($userId)
{
    global $pdo;
    $sql = 'SELECT COUNT(id_trip) FROM user_history WHERE id_user = :userId;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function addCompanion($userId, $companionId)
{
    global $pdo;
    $sql = 'INSERT INTO companions (`id_user`, `id_companion`) VALUES (:userId,:companionId)';
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['userId' => $userId, 'companionId' => $companionId]);

}

function selectCompanionsbyUserId($userId){
    $mass = [];
    global $pdo;
    $sql = 'SELECT DISTINCT u.id FROM companions c JOIN user u ON c.id_user = u.id OR c.id_companion = u.id WHERE (c.id_user = :userId OR c.id_companion = :userId) AND u.id <> :userId;';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId'=> $userId]);
    $intersectedIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($intersectedIds as $elem) {
            
        $sql = 'SELECT id, name, picture, link FROM user WHERE id = :userId';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['userId'=> $elem['id']]);
        $mas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $mass[] = $mas;
    }
    return $mass;

}
function selectReviewsbyId($reviews){
    global $pdo;
    $sql = 'SELECT r.text, t.picture, t.name
    FROM reviews r
    JOIN trip t ON r.id_trip = t.id
    WHERE r.id = :reviewsId';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['reviewsId'=> $reviews]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}