<?php 
session_start();
include_once('header.php');

if (isset($_SESSION['admin'])) {
	
?>

	<div class="py-4">
		<div class="row gx-3 gy-3">
			<div class="col-md-3 col-12">
				<a href="customer.php" class="text-decoration-none text-reset">
					<div class="customer-card card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Customer</h5>
							<h6 class="card-subtitle mb-2 text-muted"></h6>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3 col-12">
				<a href="reservation.php" class="text-decoration-none text-reset">
					<div class="reservation-card card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Reservation</h5>
							<h6 class="card-subtitle mb-2 text-muted"></h6>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

<?php

} else {
	header('location: login.php');
}
include_once('footer.php');

?>