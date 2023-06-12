<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

if (isset($_POST['hotel_id'])) {
    $uid = $_POST['user_id'];
    $hid = $_POST['hotel_id'];

    $check_query = "SELECT * FROM favourites WHERE user_id = ? AND hotel_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $uid, $hid);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    if($result->num_rows > 0) {
        $conn->close();
        sleep(1);
        header("Location: http://localhost/NibbaHotel/book-online.php");
    }

    $query = "INSERT INTO favourites (id, user_id, hotel_id) VALUES (NULL, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $uid, $hid);
    $result = $stmt->execute();

    $stmt->close();

    if ($result) {
        $conn->close();
        sleep(1);
        header("Location: http://localhost/NibbaHotel/book-online.php");
    }
}

?>