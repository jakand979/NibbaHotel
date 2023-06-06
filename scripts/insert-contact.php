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

if (isset($_POST['contact-type']) && isset($_POST['phone'])) {
    $contactType = $_POST['contact-type'];
    $userPhone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');
    $user_id = $_SESSION['user_id'];


    $init_check = "SELECT * FROM contacts WHERE user_id = ?";
    $stmt = $conn->prepare($init_check);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['phone'] == $userPhone) {
            $error['nonunique'] = 'You can not add 2 identical phone numbers!';
        } else {
            $query = "INSERT INTO contacts (id, type, phone, user_id) 
            VALUES (NULL, ?, ?, ?);";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $contactType, $userPhone, $user_id);
            $result = $stmt->execute();

            $stmt->close();

            if ($result) {
                $successmsg['success'] = 'Contact added successfully!';
            } else {
                $error['notsent'] = 'We had problems with adding contact. Try later!';
            }
        }
    } else {
        if ($result->num_rows == 2) {
            $error['full'] = 'You can not add more contacts!';
        } else {
            $query = "INSERT INTO contacts (id, type, phone, user_id) 
            VALUES (NULL, ?, ?, ?);";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $contactType, $userPhone, $user_id);
            $result = $stmt->execute();

            $stmt->close();

            if ($result) {
                $successmsg['success'] = 'Contact added successfully!';
            } else {
                $error['notsent'] = 'We had problems with adding contact. Try later!';
            }
        }
    }
    $conn->close();
}

?>