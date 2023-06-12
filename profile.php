<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
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
        <div class="profile">
            <?php
            if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
                $username = $_SESSION['username'];
                $email = $_SESSION['email'];
                echo '
                <p>Login: ' . $username .'</p>
                <p>Email: ' . $email .'</p>
                <p><a href="user-data.php">YOUR CONTACTS / ADDRESSES</a></p>
                <p><a href="reservations.php">YOUR RESERVATIONS</a></p>
                ';
            }
            ?>
        </div>
        <div class="contact">
            <?php
                include('scripts/insert-contact.php');
            ?>
            <form id="contactForm" action="" method="post">
                <select class="contact-type" name="contact-type">
                    <option value="mobile phone">mobile phone</option>
                    <option value="landline phone">landline phone</option>
                </select>
                <input type="text" name="phone" placeholder="phone" maxlength="20" required
                    <?php if (isset($error['nonunique'])) {
                        echo 'class="error"';
                    } ?>>
                <?php if (isset($successmsg['success'])) {
                    echo '<br><span class="success-message">' . $successmsg['success'] . '</span>';
                } ?>
                <?php if (isset($error['full'])) {
                    echo '<br><span class="error-message">' . $error['full'] . '</span>';
                } ?>
                <?php if (isset($error['nonunique'])) {
                    echo '<br><span class="error-message">' . $error['nonunique'] . '</span>';
                } ?>
                <?php if (isset($error['notsent'])) {
                    echo '<br><span class="error-message">' . $error['notsent'] . '</span>';
                } ?>
            </form>
            <button type="submit" form="contactForm">SUBMIT</button>
        </div>
        <div class="address">
            <?php
                include('scripts/insert-address.php');
            ?>
            <form id="addressForm" action="" method="post">
                <input type="text" name="street" placeholder="street" maxlength="255" required>
                <input type="text" name="city" placeholder="city" maxlength="255" required>
                <input type="text" name="homenumber" placeholder="home number" maxlength="20" required>
                <input type="text" name="zipcode" placeholder="zipcode" maxlength="50" required>
                <select class="address-type" name="address-type">
                    <option value="address of residence">address of residence</option>
                    <option value="mailing address">mailing address</option>
                </select>
                <?php if (isset($successmsg['success'])) {
                    echo '<br><span class="success-message">' . $successmsg['success'] . '</span>';
                } ?>
                <?php if (isset($error['full'])) {
                    echo '<br><span class="error-message">' . $error['full'] . '</span>';
                } ?>
                <?php if (isset($error['duplicate'])) {
                    echo '<br><span class="error-message">' . $error['duplicate'] . '</span>';
                } ?>
                <?php if (isset($error['notsent'])) {
                    echo '<br><span class="error-message">' . $error['notsent'] . '</span>';
                } ?>
            </form>
            <button type="submit" form="addressForm">SUBMIT</button>
        </div>
    </div>
</body>
</html>