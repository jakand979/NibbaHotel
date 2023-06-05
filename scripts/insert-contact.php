<?php

session_start();

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$successmsg = array();

$error = array();

if (isset($_POST['contactData'])) {
    $contactData = json_decode($_POST['contactData'], true);

    foreach ($contactData as $contact) {
        $type = htmlspecialchars(trim($contact['type']), ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars(trim($contact['phone']), ENT_QUOTES, 'UTF-8');
        $user_id = $_SESSION['user_id'];

        $contact_query = "INSERT INTO contacts (id, type, phone, user_id) 
            VALUES (NULL, ?, ?, ?);";
        $stmt = $conn->prepare($contact_query);
        $stmt->bind_param("ssi", $type, $phone, $user_id);
        $result = $stmt->execute();
    }
    $conn->close();

    usleep(1000000);
}
?>