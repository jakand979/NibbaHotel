<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel</title>
</head>
<body>
    <?php
        include('scripts/login.php');
    ?>
    <div class="container">
        <form id="sign-in-form" action="" method="post">
            <a href="index.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
            <input type="text" name="login" placeholder="login" maxlength="255" required
                <?php if (isset($errors['username'])) {
                    echo 'class="error"';
                } ?>>
            <input type="password" name="password" placeholder="password" maxlength="255" required
                <?php if (isset($errors['password'])) {
                    echo 'class="error"';
                } ?>>
            <?php if (isset($errors['username'])) {
                echo '<span class="error-message">' . $errors['username'] . '</span>';
            } ?>
            <?php if (isset($errors['password'])) {
                echo '<span class="error-message">' . $errors['password'] . '</span>';
            } ?>
            <a href="sign-up.php">Don't have account yet? <b>Sign up!</b></a>
        </form>
        <button type="submit" form="sign-in-form">LOG IN</button>
    </div>
</body>
</html>