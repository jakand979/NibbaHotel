<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/sign-in-styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
    <script src="scripts/handleSignIn.js"></script>
</head>
<body>
    <div class="sign-in-container">
        <form id="sign-in-form" action="scripts/sign.php" method="post">
            <img src="images/hotel-sign.png">
            <h2>NIBBA HOTEL</h2>
            <input type="text" id="login" name=login" placeholder="login" required>
            <input type="password" id="password" name="password" placeholder="password" required>
            <a href="sign-up.php">Don't have account yet? <b>Sign up!</b></a>
        </form>
        <button type="submit" form="sign-in-form">LOG IN</button>
    </div>
</body>
</html>