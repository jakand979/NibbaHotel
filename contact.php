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
        include('scripts/contact-form.php');
    ?>
    <div class="container">
        <form id="contact-form" action="" method="post">
            <a href="index.php"><img src="images/hotel-sign.png" alt="hotel_sign"></a>
            <p class="contact-message">You have questions?<b> Fill this contact form!</b></p>
            <input type="text" name="name" placeholder="your name" maxlength="255" required>
            <input type="text" name="email" placeholder="your email" maxlength="255" required>
            <textarea name="message" placeholder="type your message here ... (max 500 characters)"
                      maxlength="500" required></textarea>
            <?php if (isset($successmsg['success'])) {
                echo '<span class="success-message">' . $successmsg['success'] . '</span>';
            } ?>
            <?php if (isset($error['notsent'])) {
                echo '<span class="error-message">' . $error['notsent'] . '</span>';
            } ?>
        </form>
        <button type="submit" form="contact-form">SUBMIT</button>
    </div>
</body>
</html>

