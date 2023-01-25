<?php
require_once('connect.php');
$parkingID = $_GET['parkingID'];
$stmt = $conn->prepare("DELETE FROM customer WHERE parkingID = ?");
$stmt->bind_param("i", $parkingID);
$stmt->execute();
$stmt->close();
header('location: customer.php');