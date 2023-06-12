<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/reservation.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
    <?php
        $image_url = $_POST['img_url'];
        $name = $_POST['name'];
        $uid = $_POST['uid'];
        $hid = $_POST['hid'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $checkIn = strtotime($check_in);
        $checkOut = strtotime($check_out);
        if ($checkIn >= $checkOut) {
            header('Location: http://localhost/NibbaHotel/book-online.php');
        }
        include('scripts/calculate-days-price.php');
        $days = calculateDays($check_in, $check_out);
        $pricePerNight = 350;
        $price = calculatePrice($check_in, $check_out, $pricePerNight);
        echo
        '<div class="container">
            <a href="book-online.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
            <div class="details">
                <h1>Your reservation details</h1>
                <img src="'. $image_url .'" alt="hotel_image">
                <h2>'. $name . '</h2>
                <p>Check-in: '. $check_in .'</p>
                <p>Check-out: '. $check_out .'</p>
                <p>Days: '. $days .'</p>
                <p>Price: '. $price .'$</p>
                <form action="scripts/insert-booking-payment.php" method="post">
                    <select name="payment_method">
                        <option value="Google Pay / Apple Pay">Google Pay / Apple Pay</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Visa">Visa</option>
                        <option value="Bank transfer">Bank transfer</option>
                    </select>
                    <input type="hidden" name="amount" value="'. $price .'">
                    <input type="hidden" name="uid" value="'. $uid .'">
                    <input type="hidden" name="hid" value="'. $hid .'">
                    <input type="hidden" name="check_in" value="'. $check_in .'">
                    <input type="hidden" name="check_out" value="'. $check_out .'">
                    <button type="submit">PAY</button>
                </form>
            </div>
        </div>';
    ?>
</body>
</html>
