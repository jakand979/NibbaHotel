<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/booking.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
    <?php
        $host = 'localhost';
        $dbusername = 'root';
        $dbpassword = '';
        $dbname = 'hotel_booking';

        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die('Failed to connect with database: ' . $conn->connect_error);
        }

        $user_id = $_POST['uid'];

        $query = "SELECT MAX(check_out) AS last_check_out FROM bookings WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        $checkInMin = null;
        $checkOutMin = null;

        $lastBooking = $result->fetch_assoc();
        $lastCheckOut = $lastBooking['last_check_out'];

        if ($lastCheckOut == NULL) {
            $checkInMin = date('Y-m-d', strtotime('now'));
            $checkOutMin = date('Y-m-d', strtotime('+1 day'));
        } else {
            $checkInMin = date('Y-m-d', strtotime($lastCheckOut . ' +1 day'));
            $checkOutMin = date('Y-m-d', strtotime($lastCheckOut . ' +2 days'));
        }

        $conn->close();

        $name = $_POST['name'];
        $uid = $_POST['uid'];
        $hid = $_POST['hid'];
        $image_url = $_POST['img_url'];
        echo
        '<div class="container">
            <a href="book-online.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
            <h1>'. $name . '</h1>
            <form id="dates" action="reservation.php" method="post">
                <input type="hidden" name="name" value="'. $name .'">
                <input type="hidden" name="uid" value="'. $uid .'">
                <input type="hidden" name="hid" value="'. $hid .'">
                <input type="hidden" name="img_url" value="'. $image_url .'">
                <label for="check_in">Check-in</label>
                <input type="date" name="check_in" min="'. $checkInMin .'"" value="" required>
                <label for="check_out">Check-out</label>
                <input type="date" name="check_out" min="'. $checkOutMin .'" required>
                <button type="submit">GO TO RESERVATION</button>
             </form>
        </div>';
    ?>

</body>
</html>

