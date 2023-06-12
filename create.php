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
        <form id="createForm" action="scripts/create-hotel.php" method="post">
            <input type="text" name="name" placeholder="name" maxlength="255" required>
            <input type="text" name="address" placeholder="address" maxlength="255" required>
            <input type="text" name="phone" placeholder="phone" maxlength="20" required>
            <textarea class="desc" name="description" placeholder="type description here ... (max 1000 characters)"
                      maxlength="1000" required></textarea>
            <input type="text" name="image_url" placeholder="url to hotel image" maxlength="255" required>
        </form>
        <button type="submit" form="createForm">SUBMIT</button>
    </div>
</div>
</body>
</html>