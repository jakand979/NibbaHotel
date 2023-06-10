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
            include('scripts/add-favourite.php');
            echo
            '<div class="hotel">
                <form id="favourites-' . $hotel_id . '" action="" method="post">
                    <input type="hidden" name="user_id" value="' . $user_id . '">
                    <input type="hidden" name="hotel_id" value="' . $hotel_id . '">
                </form>
                <img src="' . $image_url . '" alt="hotel_image">
                <h1>' . $name . '</h1>
                <button type="submit" form="favourites-' . $hotel_id . '" class="fav">&#x2764;</button>
                <p>Address: ' . $address . '</p>
                <p>Phone: ' . $phone . '</p>
                <span>' . $description . '</span>
                <a href="book-now.php"><button>BOOK NOW!</button></a>
            </div>';
        } else {
            echo
            '<div class="hotel">
                <img src="'. $image_url .'" alt="hotel_image">
                <h1>' . $name . '</h1>
                <p>Address: ' . $address . '</p>
                <p>Phone: ' . $phone . '</p>
                <span>' . $description . '</span>
                <a href="sign-in.php"><button>SIGN IN</button></a>
            </div>';
        }
    }
}

$conn->close();

?>