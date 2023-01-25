<?php
include_once('header.php');

if (isset($_SESSION['admin'])) {
	// retrieve the parkingID from the URL
	$parkingID = $_GET['parkingID'];
	$stmt = $conn->prepare("SELECT * FROM customer WHERE parkingID = ?");
	$stmt->bind_param('i', $parkingID);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$count = $result->num_rows;
	$stmt->close();

	if (isset($_POST['update'])) {
		$plateNo = $_POST['plateNo'];
		$carModel = $_POST['carModel'];
		$carColor = $_POST['carColor'];
		$stmt = $conn->prepare("UPDATE customer SET plateNo = ?, carModel = ?, carColor = ? WHERE parkingID = ?");
		$stmt->bind_param('sssi', $plateNo, $carModel, $carColor, $parkingID);
		$stmt->execute();
		$stmt->close();

		if ($stmt) {
			echo "<script>alert('Update successful!')</script>";
			header('location: customer.php');
		} else {
			echo "<script>alert('Update failed!')</script>";
			header('location: customer.php');
		}
	}
	?>

	<div class="d-flex justify-content-center">
		<div class="card px-1 py-2 mt-5">
			<form action="" method="POST">
				<div class="card-body">
					<h6 class="mt-2">Please update the following information regarding car with plate number: <?= $row['plateNo'] ?></h6>
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
include_once('footer.php');
?>