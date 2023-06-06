<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$errors = array();

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['roles']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $userLogin = htmlspecialchars(trim($_POST['login']), ENT_QUOTES,'UTF-8');
    $userEmail = htmlspecialchars(trim($_POST['email']), ENT_QUOTES,'UTF-8');
    $default_role = 1;
    $userPassword = htmlspecialchars(trim($_POST['password']), ENT_QUOTES,'UTF-8');
    $repeatedPassword = htmlspecialchars(trim($_POST['password2']), ENT_QUOTES,'UTF-8');

    $hashedUserPassword = hash('sha256', $userPassword);

    if ($userPassword == $repeatedPassword) {
        $check_query = "SELECT * FROM users WHERE username = ? OR email = ? OR password = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("sss", $userLogin, $userEmail, $hashedUserPassword);
        $stmt->execute();
        $check_result = $stmt->get_result();

        $stmt->close();

        if ($check_result && $check_result->num_rows > 0) {
            while ($row = $check_result->fetch_assoc()) {
                if ($row['username'] == $userLogin) {
                    $errors['login'] = 'Login already exists.';
                }
                if ($row['email'] == $userEmail) {
                    $errors['email'] = 'Email already exists.';
                }
                if ($row['password'] == $hashedUserPassword) {
                    $errors['password'] = 'Password already exists.';
                }
            }
        } else {
            $register_query = "INSERT INTO users (id, password, created_at, role_id, email, username) 
            VALUES (NULL, ?, current_timestamp(), ?, ?, ?);";
            $stmt = $conn->prepare($register_query);
            $stmt->bind_param("siss", $hashedUserPassword, $default_role, $userEmail, $userLogin);
            $result = $stmt->execute();

            $stmt->close();

            if ($result) {
                $conn->close();
                sleep(1);
                echo '<script>window.location.href = "http://localhost/NibbaHotel/sign-in.php";</script>';
            } else {
                $errors['database'] = 'Failed to register user. Please try again later.';
            }
        }
    } else {
        $errors['password2'] = 'Passwords are not equal.';
    }

    $conn->close();
}

?>