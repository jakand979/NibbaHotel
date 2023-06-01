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
    <script src="scripts/dropdown-handler.js"></script>
</head>
<body>
    <nav class="home-nav-container">
        <a class="nav-home" href="index.php"><h1>NIBBA HOTEL</h1></a>
        <a class="nav-links" href="gallery.html">GALLERY</a>
        <a class="nav-links" href="bookings.php">BOOK ONLINE</a>
        <a class="nav-links" href="favourites.php">FAVOURITES</a>
        <a class="nav-links" href="contact.php">CONTACT US</a>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '
            <select class="click-me-dropdown" id="dropdown" onchange="redirectToPage()">
                <option disabled selected>' . $username . '!</option>
                <option value="profile.php">PROFILE</option>
                <option value="logout.php">LOGOUT</option>
            </select>
            ';
        } else {
            echo '<a href="sign-in.php"><button class="click-me">SIGN IN</button></a>';
        }
        ?>
    </nav>
    <div class="slider">
        <div><img src="images/img1.png" alt="first_image"></div>
        <div><img src="images/img2.png" alt="second_image"></div>
        <div><img src="images/img3.png" alt="third_image"></div>
        <div><img src="images/img4.png" alt="fourth_image"></div>
        <div><img src="images/img5.png" alt="fifth_image"></div>
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
    <div class="about-us">
        <h1>Welcome to Sunny Hotel Nibba!</h1>
        <span>We were here since <b>1969</b>, to serve our visitors the best! We have <b>multiple hotels</b> in various <b>coastal regions</b> around the <b>world</b>!
            We want to invite you to an <b>unforgettable experience</b> at our luxurious oasis of relaxation, where the sun, beautiful beaches, and <b>excellent service</b> create a <b>unique atmosphere</b> of comfort and pleasure.
            As you step through our doors, you will be greeted by our <b>friendly staff</b>, ready to fulfill your every wish.
            Our <b>elegant lobbies</b> impress with their spaciousness and décor inspired by the local culture, creating an atmosphere of tranquility and comfort.
            Sunny <b>Hotel Nibba</b> offers a <b>wide selection</b> of luxury rooms and suites, designed with <b>meticulous attention</b> to detail.
            Each room is spacious, air-conditioned, and equipped with <b>state-of-the-art amenities</b> such as a flat-screen TV, minibar, and complimentary Wi-Fi.
            Moreover, most of our rooms feature <b>private balcony</b> with <b>sea views</b>, where you can relax and enjoy the <b>breathtaking scenery</b>.
            Our <b>pool complexes</b> are a <b>true haven</b> for water enthusiasts. Immerse yourself in our stunning <b>Olympic-sized pools</b>, unwind in the <b>jacuzzis</b>, or enjoy <b>refreshing drinks</b> at our poolside bars.
            For those who prefer direct contact with the sea, we invite you to our private beaches, where white sand and turquoise water provide <b>unforgettable moments</b> of relaxation and pleasure.
            Our restaurants are a <b>true paradise</b> for your taste buds.
            Our <b>talented teams</b> of chefs serves international and local cuisine, prepared with the <b>freshest ingredients</b>.
            In our <b>elegant interiors</b> or on the restaurant terraces, you can indulge in <b>exquisite dishes</b> and <b>fine wines</b> that enhance the flavor of your <b>exceptional stay</b>.</span>
    </div>
    <div class="facilites">
        <img src="images/hotel.png" class="item" alt="wifi_sign">
        <img src="images/deck-chair.png" class="item" alt="sunny_deckchair_beach">
        <img src="images/receptionist.png" class="item" alt="reception_sign"
        <img src="" class="" alt="">
        <img src="images/bellboi.png" class="item" alt="bell_boy">
        <img src="images/maid.png" class="item" alt="maid">
        <img src="images/television.png" class="item" alt="TV">
        <img src="images/minibar.png" class="item" alt="minibar">
        <img src="images/wifi.png" class="item" alt="wifi_sign">
    </div>
    <footer class="footer-style">
        <img src="images/pin.png" class="footer-item" alt="location_pin">
        <p class="footer-item">2801 Hill St, New Smyrna Beach, FL 32169, United States</p>
        <img src="images/phone-call.png" class="footer-item" alt="phone_call">
        <p class="footer-item">(555) 555-1234</p>
        <img src="images/email.png" class="footer-item" alt="phone_call">
        <p class="footer-item">nibba.contact@travel.com</p>
    </footer>
</body>
</html>
