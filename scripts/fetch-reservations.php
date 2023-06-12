<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$uid = $_SESSION['user_id'];

include('scripts/calculate-days-price.php');

$query = "SELECT check_in, check_out, image_url, name, created_at FROM bookings 
INNER JOIN hotels ON hotels.id = bookings.hotel_id WHERE user_id = ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();

$status_id = 1;

$status_query = "SELECT * FROM statuses";
$result2 = $conn->query($status_query);

$row2 = $result2->fetch_assoc();
$status_name = $row2['sname'];

while ($row = $result->fetch_assoc()) {
    $image_url = $row['image_url'];
    $name = $row['name'];

    $check_in = $row['check_in'];
    $check_out = $row['check_out'];

    $created_at = $row['created_at'];

    $days = calculateDays($check_in, $check_out);
    $pricePerNight = 350;
    $price = calculatePrice($check_in, $check_out, $pricePerNight);

    echo
    '<div class="reservation">
        <img src="'. $image_url .'" alt="hotel_image">
        <h2>'. $name . '</h2>
        <p>Check-in: '. $check_in .'</p>
        <p>Check-out: '. $check_out .'</p>
        <p>Booked at: '. $created_at .'</p>
        <p>Price: '. $price .'$</p>   
        <p>Payment status: '. $status_name .'</p> 
    </div>';
}

$conn->close();

?>