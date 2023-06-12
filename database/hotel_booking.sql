-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Cze 2023, 00:29
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `homenumber` varchar(20) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `city`, `homenumber`, `zipcode`, `type`, `user_id`) VALUES
(1, 'Waterview Lane', 'Albuquerque', '95', '87106', 'address of residence', 4),
(2, 'Westfall Avenue', 'Santa Fe', '1129', '87501', 'mailing address', 4),
(3, 'Adamieckiego', 'Dąbrowa Górnicza', '23', '44-300', 'address of residence', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `phone`, `user_id`) VALUES
(1, 'mobile phone', '505-555-0117', 4),
(2, 'mobile phone', '505-555-0171', 4),
(3, 'mobile phone', '505-555-0119', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `hotel_id`) VALUES
(5, 7, 1),
(7, 7, 4),
(12, 4, 2),
(14, 4, 3),
(15, 7, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `forms`
--

INSERT INTO `forms` (`id`, `name`, `email`, `message`) VALUES
(1, 'Rajesh', 'rajesh@wp.pl', 'How many dollars I have to pay for one night at your exclusive hotels? Thank you for future answer.'),
(2, 'Jacob', 'jacob@mailmaster.com', 'Is there any other way of paying instead of BLIK today? I dont have BLIK serivce in my bank account!'),
(3, 'DissatisfiedMan', 'dis@twitch.tv', 'I am very dissatisfied with your service in Nibba Hotel Thailand. Where can I send letter of complaint? Thank you for future answer.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `phone`, `description`, `image_url`) VALUES
(1, 'Nibba Hotel South Carolina', '2800 Rosewood Dr, Charleston, SC 29205, United States', '(803) 251-8990', 'Nibba Hotel South Carolina is strategically located at 2800 Rosewood Dr, Charleston, SC 29205, United States, offering easy access to the vibrant city and its attractions. From historical landmarks to cultural hotspots, there is something for everyone to explore and discover. Come and experience the unparalleled luxury and impeccable service that define Nibba Hotel South Carolina. We guarantee that your stay with us will leave you with cherished memories that will last a lifetime. Book your stay today and let us create an unforgettable experience just for you!', 'images/img1.png'),
(2, 'Nibba Hotel Thailand', '86 Chakrapong Rd., Talat Yot, Phra Nakhon, กรุงเทพมหานคร, กรุงเทพมหานคร 10200, Thailand', '02 282 9948', 'Welcome to Nibba Hotel Thailand, a captivating oasis situated in the heart of Bangkok. As part of the esteemed Nibba Hotel chain, we are dedicated to providing our guests with an unforgettable experience that beautifully combines luxurious comforts with the rich tapestry of Thai culture. Nestled at 86 Chakrapong Rd., Talat Yot, Phra Nakhon, กรุงเทพมหานคร, กรุงเทพมหานคร 10200, Thailand, our hotel invites you to immerse yourself in the vibrant energy and warmth of this enchanting city!', 'images/img2.png'),
(3, 'Nibba Hotel Philippines', 'Tin-ao, Cagayan de Oro City, Misamis Oriental, Cagayan de Oro, Northern Mindanao 9000, Philippines', '(088) 855 3609', 'The location of Nibba Hotel Philippines provides convenient access to the country\'s cultural and historical treasures. Immerse yourself in the bustling streets of Manila, where modern skyscrapers coexist with Spanish colonial architecture. Explore historic sites such as Intramuros, the ancient walled city, or visit the iconic Rizal Park, a sprawling green oasis in the heart of the city. Discover the vibrant local markets, where you can find unique crafts, vibrant textiles, and authentic Filipino souvenirs. Escape to the enchanting world of Nibba Hotel Philippines, where luxury meets the natural wonders and rich cultural heritage of the Philippines!', 'images/img3.png'),
(4, 'Nibba Hotel Peru', 'Salaverry 2443, San Isidro, LIMA27 Lima, Peru', '(01) 3159600', 'Welcome to Nibba Hotel Peru, an extraordinary retreat nestled in the vibrant city of Lima. As a distinguished member of the esteemed Nibba Hotel chain, we offer a seamless blend of modern luxury, Peruvian charm, and exceptional service. Located at Salaverry 2443, San Isidro, LIMA27 Lima, Peru, our hotel provides the perfect base for exploring the rich cultural heritage and culinary delights that this captivating country has to offer. Escape to the captivating world of Nibba Hotel Peru, where modern comforts intertwine with the enchanting culture of Peru!', 'images/img4.png'),
(5, 'Nibba Hotel California', '3251 20th Ave, San Francisco, CA 94132, United States', '(323) 547-5497', 'Welcome to Nibba Hotel California, a remarkable destination that perfectly captures the essence of the Golden State. As a proud member of the prestigious Nibba Hotel chain, we are committed to providing our guests with an unforgettable experience that combines California\'s vibrant energy, stunning natural beauty, and unparalleled hospitality. Located at 3251 20th Ave, San Francisco, CA 94132, United States, our hotel offers a gateway to explore the iconic city of San Francisco and its surrounding wonders. Book your stay with us today and let us guide you on a remarkable journey through the beauty and allure of California\'s iconic landscapes and renowned hospitality!', 'images/img5.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `method` varchar(20) NOT NULL,
  `amount` int(12) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `statuses`
--

INSERT INTO `statuses` (`status_id`, `sname`) VALUES
(1, 'processed');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `password`, `created_at`, `role_id`, `email`, `username`) VALUES
(1, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2023-06-09 17:49:16', 1, 'admin123@interia.pl', 'admin123'),
(2, '9924801e8aca687d0a71f4ab14a8ed1644d48348dce8941b6cfdf7fb3076bae2', '2023-06-09 17:51:56', 1, 'admin234@wp.pl', 'admin234'),
(3, '255876d41c8df2de3170f47fd59d89a8d71e3ca678b8b3dac1981b61181def8c', '2023-06-09 17:57:45', 1, 'admin345@gmail.com', 'admin345'),
(4, 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446', '2023-05-27 04:58:32', 2, 'user123@interia.pl', 'user123'),
(5, '07fb47212f7d30f8c9e1d9843228b65a301cee6ea7624ea9372539ea21603246', '2023-06-09 17:58:44', 2, 'user234@wp.pl', 'user234'),
(6, 'e3c702b7186cec0d9d6cc0d703adeed3873577cc673aec304c72b25af935a170', '2023-06-09 18:00:29', 2, 'user345@gmail.com', 'user345'),
(7, 'c670f7b23c1bf997ec890e9d23ea7c016e12b243bdbd151f08baf5f0b86a7c5e', '2023-06-10 22:38:18', 2, 'user456@mailing.com', 'user456');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indeksy dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indeksy dla tabeli `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeksy dla tabeli `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`);

--
-- Ograniczenia dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
