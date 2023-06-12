<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$hid = $_POST['hid'];

$query = "DELETE FROM hotels WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $hid);
$result = $stmt->execute();

$stmt->close();

$conn->close();

sleep(1);
header('Location: http://localhost/NibbaHotel/admin-panel.php');

?>