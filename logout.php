<?php

session_start();
session_destroy();
sleep(1);
header("Location: http://localhost/NibbaHotel/");

?>