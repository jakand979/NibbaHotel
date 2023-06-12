<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$hid = $_POST['hid'];

$query = "SELECT * FROM hotels WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $hid);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();

$row = $result->fetch_assoc();

$name = $row['name'];
$address = $row['address'];
$phone = $row['phone'];
$description = $row['description'];
$image_url = $row['image_url'];

echo
'<form id="updateForm" action="update-hotel.php" method="post">
    <input type="hidden" name="hid" value="' . $hid .'">
    <input type="text" name="name" value="'. $name .'" maxlength="255" required>
    <input type="text" name="address" value="'. $address .'" maxlength="255" required>
    <input type="text" name="phone" value="'. $phone .'" maxlength="20" required>
    <textarea class="desc" name="description" maxlength="1000" required>'. $description .'</textarea>
    <input type="text" name="image_url" value="'. $image_url .'" maxlength="255" required>
</form>
<button type="submit" form="updateForm">SUBMIT</button>';