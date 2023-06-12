<?php

function calculateDays($checkInDate, $checkOutDate) {
    $checkIn = strtotime($checkInDate);
    $checkOut = strtotime($checkOutDate);

    $secondsDiff = $checkOut - $checkIn;
    $daysDiff = floor($secondsDiff / (60 * 60 * 24));

    return $daysDiff;
}

function calculatePrice($checkInDate, $checkOutDate, $pricePerNight) {
    $days = calculateDays($checkInDate, $checkOutDate);
    $totalPrice = $days * $pricePerNight;

    return $totalPrice;
}

?>
