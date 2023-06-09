<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$query = "SELECT * FROM hotels";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $description = $row['description'];
        $image_url = $row['image_url'];
        echo ' ';
    }
}

?>