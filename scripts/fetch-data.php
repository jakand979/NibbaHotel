<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM contacts WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();

while ($row = $result->fetch_assoc()) {
    $contact_id = $row['id'];
    $contactType = $row['type'];
    $phone = $row['phone'];
    echo
    '<div class="contact">
        <p>Contact type: ' . $contactType . '</p>
        <p>Phone: ' . $phone . '</p>
        <form action="scripts/delete-data.php" method="post">
            <input type="hidden" name="contact_id" value="' . $contact_id . '">
            <button type="submit">DELETE</button>
        </form>
    </div>';
}

$query = "SELECT * FROM addresses WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();

while ($row = $result->fetch_assoc()) {
    $address_id = $row['id'];
    $street = $row['street'];
    $city = $row['city'];
    $homenumber = $row['homenumber'];
    $zipcode = $row['zipcode'];
    $addressType = $row['type'];
    echo
    '<div class="address">
        <p>Street: ' . $street . '</p>
        <p>City: ' . $city . '</p>
        <p>Home number: ' . $homenumber . '</p>
        <p>Zipcode: ' . $zipcode . '</p>   
        <p>Adress type: ' . $addressType . '</p>     
        <form action="scripts/delete-data.php" method="post">
            <input type="hidden" name="address_id" value="' . $address_id . '">
            <button type="submit">DELETE</button>
        </form>     
    </div>';
}

$conn->close();

?>