<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');
$description = htmlspecialchars(trim($_POST['description']), ENT_QUOTES, 'UTF-8');
$image_url = htmlspecialchars(trim($_POST['image_url']), ENT_QUOTES, 'UTF-8');

$query = "INSERT INTO hotels (id, name, address, phone, description, image_url)
VALUES (NULL, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $name, $address, $phone, $description, $image_url);
$result = $stmt->execute();

$stmt->close();

$conn->close();

sleep(1);
header('Location: http://localhost/NibbaHotel/admin-panel.php');

?>
