<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$successmsg = array();
$errors = array();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die('Failed to connect with database: ' . $conn->connect_error);
    }

    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $msg = $_POST['message'];

    $contact_query = "INSERT INTO forms (id, user_id, name, email, message) 
            VALUES (NULL, ?, current_timestamp(), ?, ?, ?);";

}