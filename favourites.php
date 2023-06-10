<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/favourites.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="container">
        <a href="index.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
        <?php
            include('scripts/fetch-favourites.php');
        ?>
    </div>
</body>
</html>

