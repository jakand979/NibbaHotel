<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/data-page.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
<?php
    session_start();
?>
<div class="container">
    <a href="profile.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
    <?php
        include('scripts/fetch-data.php');
        include('scripts/delete-data.php');
    ?>
</div>
</body>
</html>
