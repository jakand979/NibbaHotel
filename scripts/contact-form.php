<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$successmsg = array();
$error = array();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die('Failed to connect with database: ' . $conn->connect_error);
    }

    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $msg = $_POST['message'];

    $contact_query = "INSERT INTO forms (id, name, email, message) 
            VALUES (NULL, ?, ?, ?);";
    $stmt = $conn->prepare($contact_query);
    $stmt->bind_param("sss", $userName, $userEmail, $msg);
    $result = $stmt->execute();

    if ($result) {
        $successmsg['success'] = 'Contact form sent successfully!';
    } else {
        $error['notsent'] = 'We had problems with receiving your message. Try later!';
    }

    $conn->close();

}

?>
