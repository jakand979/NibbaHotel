<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel Admin Panel</title>
</head>
<body>
<div>
    <div class="container">
        <a href="admin-panel.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
        <?php
            include('scripts/fetch-hotel.php');
        ?>
    </div>
</div>
</body>
</html>
