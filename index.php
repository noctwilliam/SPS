<?php 
session_start();
include_once('connect.php');
include_once('header.php');
if (isset($_SESSION['admin'])) {
	
?>

	<div>This is index shown after login</div>

<?php

} else {
	header('location: login.php');
}
include_once('footer.php');

?>