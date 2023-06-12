<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

if (isset($_POST['payment_method']) && isset($_POST['amount']) && isset($_POST['uid']) && isset($_POST['hid']) && isset($_POST['check_in']) && isset($_POST['check_out'])) {
    $method = $_POST['payment_method'];
    $amount = $_POST['amount'];

    $status_query = "SELECT * FROM statuses";
    $result = $conn->query($status_query);

    $row = $result->fetch_assoc();
    $status = $row['sname'];

    $query = "SELECT MAX(payment_id) AS max_id FROM payments";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
    $lastId = $row['max_id'];

    if ($lastId == null) {
        $lastId = 0;
    }

    $payment_id = $lastId + 1;

    $query = "INSERT INTO payments (payment_id, method, amount, status)
    VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isis", $payment_id, $method, $amount, $status);
    $result1 = $stmt->execute();

    $stmt->close();

    $uid = $_POST['uid'];
    $hid = $_POST['hid'];
    $check_in = htmlspecialchars(trim($_POST['check_in']), ENT_QUOTES, 'UTF-8');
    $check_out = htmlspecialchars(trim($_POST['check_out']), ENT_QUOTES, 'UTF-8');
    $status_id = 1;

    $query = "SELECT * FROM payments";
    $result = $conn->query($query);

    $payment_id = $result->num_rows;

    $query = "INSERT INTO bookings (id, user_id, hotel_id, check_in, check_out, created_at, status_id, payment_id)
    VALUES (NULL, ?, ?, ?, ?, current_timestamp(), ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iissii", $uid, $hid, $check_in, $check_out, $status_id, $payment_id);
    $result2 = $stmt->execute();

    $stmt->close();

    if ($result1 && $result2) {
        header('Location: http://localhost/NibbaHotel/thank-you.php');
    }
}

$conn->close();

?>