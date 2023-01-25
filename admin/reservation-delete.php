<?php
require_once('connect.php');
$reservationID = $_GET['reservationID'];
$stmt = $conn->prepare("DELETE FROM reservation WHERE reservationID = ?");
$stmt->bind_param("i", $reservationID);
$stmt->execute();
$stmt->close();
header('location: reservation.php');
