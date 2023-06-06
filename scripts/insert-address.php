<?php

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

if (isset($_POST['street']) && isset($_POST['city']) && isset($_POST['homenumber']) && isset($_POST['zipcode']) && isset($_POST['address-type'])) {
    $street = htmlspecialchars(trim($_POST['street']), ENT_QUOTES, 'UTF-8');
    $city = htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');
    $homenumber = htmlspecialchars(trim($_POST['homenumber']), ENT_QUOTES, 'UTF-8');
    $zipcode = htmlspecialchars(trim($_POST['zipcode']), ENT_QUOTES, 'UTF-8');
    $addressType = $_POST['address-type'];
    $user_id = $_SESSION['user_id'];

    $init_check = "SELECT * FROM addresses WHERE user_id = ?";
    $stmt = $conn->prepare($init_check);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    if ($result->num_rows == 2) {
        $error['full'] = 'You can not add more addresses!';
    } else {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['type'] == $addressType) {
                if ($addressType == "address of residence") {
                    $error['duplicate'] = 'You can not have 2 residence addresses!';
                }
                if ($addressType == "mailing address") {
                    $error['duplicate'] = 'You can not have 2 mailing addresses!';
                }
            } else {
                $query = "INSERT INTO addresses (id, street, city, homenumber, zipcode, type, user_id)
                VALUES (NULL, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssi", $street, $city, $homenumber, $zipcode, $addressType, $user_id);
                $result = $stmt->execute();

                $stmt->close();

                if ($result) {
                    $successmsg['success'] = 'Address added successfully!';
                } else {
                    $error['notsent'] = 'We had problems with adding address. Try later!';
                }
            }
        } else {
            $query = "INSERT INTO addresses (id, street, city, homenumber, zipcode, type, user_id)
            VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssi", $street, $city, $homenumber, $zipcode, $addressType, $user_id);
            $result = $stmt->execute();

            $stmt->close();

            if ($result) {
                $successmsg['success'] = 'Address added successfully!';
            } else {
                $error['notsent'] = 'We had problems with adding address. Try later!';
            }
        }
    }
    $conn->close();
}

?>
