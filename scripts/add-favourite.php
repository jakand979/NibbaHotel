<?php


$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$uid = $_SESSION['user_id'];

if (isset($_POST['hotel_id'])) {
    $hid = $_POST['hotel_id'];

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