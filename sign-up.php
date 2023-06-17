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
    <div class="container">
        <?php
            include('scripts/register.php');
        ?>
        <form id="sign-up-form" action="" method="post">
            <a href="index.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
            <input type="text" name="login" placeholder="login" maxlength="255" required
                <?php if (isset($errors['login'])) {
                    echo 'class="error"';
                } ?>>
            <input type="text" name="email" placeholder="e-mail" maxlength="255" required
                <?php if (isset($errors['email'])) {
                    echo 'class="error"';
                } ?>>
            <input type="password" name="password" placeholder="password" maxlength="255" required
                <?php if (isset($errors['password2'])) {
                    echo 'class="error"';
                } ?>>
            <input type="password" name="password2" placeholder="repeat password" maxlength="255" required
                <?php if (isset($errors['password2'])) {
                    echo 'class="error"';
                } ?>>
            <?php if (isset($errors['nonregistered'])) echo '<span class="error-message">' . $errors['database'] . '</span>'; ?>
            <?php if (isset($errors['login'])) echo '<span class="error-message">' . $errors['login'] . '</span>'; ?>
            <?php if (isset($errors['email'])) echo '<span class="error-message">' . $errors['email'] . '</span>'; ?>
            <?php if (isset($errors['password2'])) echo '<span class="error-message">' . $errors['password2'] . '</span>'; ?>
            <a href="sign-in.php">Have account yet? <b>Sign in!</b></a>
        </form>
        <button type="submit" form="sign-up-form">SIGN UP</button>
    </div>
</body>
</html>