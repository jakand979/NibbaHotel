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
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];

$query = "UPDATE hotels SET name = ?, address = ?, phone = ?, description = ?, image_url = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssi", $name, $address, $phone, $description, $image_url, $hid);
$result = $stmt->execute();

$stmt->close();

$conn->close();

sleep(1);
header('Location: http://localhost/NibbaHotel/admin-panel.php');

?>