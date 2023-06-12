<?php

$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'hotel_booking';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die('Failed to connect with database: ' . $conn->connect_error);
}

$query = "SELECT * FROM hotels";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $hotel_id = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $description = $row['description'];
        $image_url = $row['image_url'];
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            include('scripts/add-favourite.php');
            echo
            '<div class="hotel">
                <form id="favourites-' . $hotel_id . '" action="" method="post">
                    <input type="hidden" name="user_id" value="' . $user_id . '">
                    <input type="hidden" name="hotel_id" value="' . $hotel_id . '">
                </form>
                <form id="hotel_name-'. $hotel_id .'" action="book-now.php" method="post">
                    <input type="hidden" name="uid" value="' . $user_id . '">
                    <input type="hidden" name="hid" value="' . $hotel_id . '">
                    <input type="hidden" name="name" value="' . $name . '">
                    <input type="hidden" name="img_url" value="'. $image_url .'">
                </form>
                <img src="' . $image_url . '" alt="hotel_image">
                <h1>' . $name . '</h1>
                <button type="submit" form="favourites-' . $hotel_id . '" class="fav">&#x2764;</button>
                <p>Address: ' . $address . '</p>
                <p>Phone: ' . $phone . '</p>
                <span>' . $description . '</span>
                <button type="submit" form="hotel_name-'. $hotel_id .'" class="book">BOOK NOW!</button>
            </div>';
        } else {
            echo
            '<div class="view">
                <img src="'. $image_url .'" alt="hotel_image">
                <h1>' . $name . '</h1>
                <p>Address: ' . $address . '</p>
                <p>Phone: ' . $phone . '</p>
                <span>' . $description . '</span>
                <a href="sign-in.php"><button type="button" class="book">SIGN IN</button></a>
            </div>';
        }
    }
}

$conn->close();

?>