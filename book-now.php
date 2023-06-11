<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/bookings.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
    <?php
        $name = $_POST['name'];
        echo
        '<div class="container">
            <a href="book-online.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
            <h1>'. $name . '</h1>
            <form id="dates" action="payment.php" method="post">
                <label for="check_in">Check-in</label>
                <input type="date" id="check_in" name="check_in" min="" required>
                <label for="check_out">Check-out</label>
                <input type="date" id="check_out" name="check_out" min="" required>
                <button type="submit">GO TO PAYMENT</button>
            </form>
        </div>';
    ?>
    <script src="scripts/current-date.js"></script>
</body>
</html>

