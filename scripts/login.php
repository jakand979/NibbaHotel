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

$errors = array();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $userLogin = htmlspecialchars(trim($_POST['login']), ENT_QUOTES,'UTF-8');
    $userPassword = htmlspecialchars(trim($_POST['password']), ENT_QUOTES,'UTF-8');

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userLogin);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    if ($result->num_rows == 1) {
        $hashedUserPassword = hash('sha256', $userPassword);

        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if ($hashedUserPassword == $storedPassword) {
            $role_query = "SELECT role_id FROM users WHERE username = ?";
            $stmt = $conn->prepare($role_query);
            $stmt->bind_param("s", $userLogin);
            $stmt->execute();
            $result = $stmt->get_result();

            $role_row = $result->fetch_assoc();
            $storedRole = $role_row['role_id'];

            $stmt->close();

            $_SESSION['username'] = $userLogin;

            $email_query = "SELECT email FROM users WHERE username = ?";
            $stmt = $conn->prepare($email_query);
            $stmt->bind_param("s", $userLogin);
            $stmt->execute();
            $result = $stmt->get_result();

            $email_row = $result->fetch_assoc();
            $_SESSION['email'] = $email_row['email'];

            $stmt->close();


            $user_id_query = "SELECT id FROM users WHERE username = ?";
            $stmt = $conn->prepare($user_id_query);
            $stmt->bind_param("s", $userLogin);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];

            $stmt->close();

            if ($storedRole == 1) {
                $conn->close();
                sleep(1);
                echo '<script>window.location.href = "http://localhost/NibbaHotel/admin-panel.php";</script>';
                exit();
            } else {
                $conn->close();
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
}

$conn->close();

?>