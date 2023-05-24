<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/sign-forms.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
    <?php
        include('scripts/login.php');
    ?>
    <div class="sign-container">
        <form id="sign-in-form" action="" method="post">
            <img src="images/hotel-sign.png" alt="hotel_sign">
            <h2>NIBBA HOTEL</h2>
            <input type="text" name="login" placeholder="login" required
                <?php if(isset($errors['username'])) echo 'class="error"'; ?>>
            <input type="password" name="password" placeholder="password" required
                <?php if(isset($errors['password'])) echo 'class="error"'; ?>>
            <?php if (isset($errors['username'])) echo '<span class="error-message">' . $errors['username'] . '</span>'; ?>
            <?php if (isset($errors['password'])) echo '<span class="error-message">' . $errors['password'] . '</span>'; ?>
            <a href="sign-up.php">Don't have account yet? <b>Sign up!</b></a>
        </form>
        <button type="submit" form="sign-in-form">LOG IN</button>
    </div>
</body>
</html>