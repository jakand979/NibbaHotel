<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT name, image_url FROM hotels INNER JOIN favourites ON hotels.id = favourites.hotel_id WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $image_url = $row['image_url'];
            $name = $row['name'];
            echo
            '<div class="hotel">
                <img src="'. $image_url .'" alt="hotel_image">
                <h1>' . $name . '</h1>
                
                <a href="book-online.php"><button>CHECK MORE INFO!</button></a>
            </div>';
        }
    }
}

$conn->close();

?>