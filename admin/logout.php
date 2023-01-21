<?php
	session_start();
	unset($_SESSION['adminID']);
	header('location: login.php');
?>