<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$error = array();

if (isset($_POST['contact_id'])) {
    $id = $_POST['contact_id'];

    $query = "DELETE FROM contacts WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    $stmt->close();

    if ($result) {
        $conn->close();
        sleep(1);
        header("Location: http://localhost/NibbaHotel/user-data.php");
    } else {
        $error['nondeleted'] = 'Failed to delete contact. Please try again later.';
    }
}

if (isset($_POST['address_id'])) {
    $id = $_POST['address_id'];

    $query = "DELETE FROM addresses WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    $stmt->close();

    if ($result) {
        $conn->close();
        sleep(1);
        header("Location: http://localhost/NibbaHotel/user-data.php");
    } else {
        $error['nondeleted'] = 'Failed to delete address. Please try again later.';
    }
}

$conn->close();

?>