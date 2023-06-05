<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/addContact.js"></script>
</head>
<body>
    <div class="container">
        <a href="index.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
        <div class="profile">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $email = $_SESSION['email'];
                $user_id = $_SESSION['user_id'];
                echo '
                <p>Login: ' . $username .'</p>
                <p>Email: ' . $email .'</p>
                <button type="button" class="btn add-contact">ADD CONTACT</button>
                <button type="button" class="btn add-address">ADD ADDRESS</button>
                ';
            }
            ?>
        </div>

    </div>
</body>
</html>