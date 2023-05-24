<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$errors = array();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $userLogin = $_POST['login'];
    $userPassword = $_POST['password'];

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die('Failed to connect with database: ' . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE username = '$userLogin'";
    $result = $conn->query($query);


    if ($result->num_rows == 1) {
        $hashedUserPassword = hash('sha256', $userPassword);

        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if ($hashedUserPassword == $storedPassword) {
            $role_query = "SELECT role_id FROM users WHERE username = '$userLogin'";
            $role_result = $conn->query($query);

            $role_row = $result->fetch_assoc();
            $storedRole = $row['role_id'];

            if ($storedRole == 1) {
                sleep(1);
                echo '<script>window.location.href = "http://localhost/NibbaHotel/admin-panel.php";</script>';
                exit();
            } else {
                sleep(1);
                echo '<script>window.location.href = "http://localhost/NibbaHotel";</script>';
                exit();
            }
        } else {
            $errors['password'] = "Incorrect password. Try again!";
        }
    } else {
        $errors['username'] = "This username does not exist.";
    }

    $conn->close();
}

?>