<?php
session_start();
require_once('../connect.php');
function active($current_page)
{
	$url_array =  explode('/', $_SERVER['REQUEST_URI']);
	$url = end($url_array);
	if ($current_page == $url) {
		echo 'active';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPS Admin</title>
	<!-- Bootstrap CSS & JS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">
	<!-- Custom JS -->
	<script src="../assets/js/main.js"></script>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">SPS</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
					<?php 
					// display the navigation bar only if the admin is logged in
					if (isset($_SESSION['admin'])) {
					?>
						<a class="nav-link <?php active('index.php') ?>" aria-current="page" href="index.php">Home</a>
						<a class="nav-link <?php active('customer.php') ?>" href="customer.php">Customers</a>
						<a class="nav-link <?php active('reservation.php') ?>" href="reservation.php">Reservation</a>
						<a class="nav-link" href="logout.php">Log Out</a>
					<?php } ?>
					</div>
				</div>
			</div>
		</nav>