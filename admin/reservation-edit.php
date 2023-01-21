<?php

include_once('header.php');
if (isset($_SESSION['admin'])) {
	$reservationID = $_GET['reservationID'];
	$stmt = $conn->prepare("SELECT * FROM reservation WHERE reservationID = ?");
	$stmt->bind_param("i", $reservationID);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$count = $result->num_rows;
	$stmt->close();
	
	if (isset($_POST['update'])){
		$plateNo = $_POST['plateNo'];
		$carModel = $_POST['carModel'];
		$carColor = $_POST['carColor'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$lotNo = $_POST['lotNo'];
		$stmt = $conn->prepare("UPDATE reservation SET plateNo = ?, carModel = ?, carColor = ?, date = ?, time = ?, lotNo = ? WHERE reservationID = ?");
		$stmt->bind_param("ssssssi", $plateNo, $carModel, $carColor, $date, $time, $lotNo, $reservationID);
		$stmt->execute();
		$stmt->close();
		if ($stmt) {
			echo "<script>alert('Update successful!')</script>";
			header('location: reservation.php');
		} else {
			echo "<script>alert('Update failed!')</script>";
			header('location: reservation.php');
		}
	}
?>

	<div class="d-flex justify-content-center">
		<div class="card px-1 py-4 mt-5">
			<form action="" method="POST">
				<div class="card-body">
					<h6 class="mt-2">Please update the following information regarding reservation: <?= $row['reservationID'] ?></h6>
					<div class="row">
						<div class="col-sm-12 py-3">
							<div class="form-group">
								<label class="py-2">Plate No</label>
								<input name="plateNo" class="form-control" type="text" placeholder="Name" value="<?= $row['plateNo']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 py-3">
							<div class="form-group">
								<label class="py-2">Car Model</label>
								<input name="carModel" class="form-control" type="text" value="<?= $row['carModel']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 py-3">
							<div class="form-group">
								<label class="py-2">Car Color</label>
								<input name="carColor" class="form-control" type="text" value="<?= $row['carColor']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 py-3">
							<div class="form-group">
								<label class="py-2">Date</label>
								<input name="date" class="form-control" type="date" value="<?= $row['date']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 py-3">
							<div class="form-group">
								<label class="py-2">Time</label>
								<input name="time" class="form-control" type="time" value="<?= $row['time']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 py-3">
							<div class="form-group">
								<label class="py-2">Lot No</label>
								<input name="lotNo" class="form-control" type="text" value="<?= $row['lotNo']; ?>">
							</div>
						</div>
					</div>
					<div class="d-flex flex-column text-center px-2 mt-3 mb-3">
						<input type="submit" name="update" value="Update" class="btn btn-primary"></input>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
} else {
	header('location: login.php');
}
