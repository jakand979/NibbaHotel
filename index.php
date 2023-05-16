<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/home-styles.css">
    <link rel="stylesheet" type="text/css" href="libraries/slick.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nibba Hotel - Your Place to Stay</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="libraries/slick.min.js"></script>
    <script src="scripts/slider.js"></script>
    <script src="scripts/hideNextSlides.js"></script>
</head>
<body>
    <nav class="home-nav-container">
        <a class="nav-home" href="index.php"><h1>NIBBA HOTEL</h1></a>
        <a class="nav-links" href="about.html">About</a>
        <a class="nav-links" href="rooms.php">Rooms</a>
        <a class="nav-links" href="check.php">Availability</a>
        <a class="nav-links" href="contact.php">Contact</a>
        <a href="sign-in.php"><button class="click-me">Sign in</button></a>
    </nav>
    <div class="slider">
        <div class="slide active"><img src="images/img1.png" alt="first_image"></div>
        <div class="slide"><img src="images/img2.png" alt="second_image"></div>
        <div class="slide"><img src="images/img3.png" alt="third_image"></div>
        <div class="slide"><img src="images/img4.png" alt="fourth_image"></div>
        <div class="slide"><img src="images/img5.png" alt="fifth_image"></div>
    </div>
    <div class="slider-navigation">
        <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</body>
</html>
