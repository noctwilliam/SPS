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
		$val_plateNo = $_POST['plateNo'];
		$val_carModel = $_POST['carModel'];
		$val_carColor = $_POST['carColor'];

		$sql = "UPDATE customer SET plateNo = '$val_plateNo', carModel = '$val_carModel', carColor = '$val_carColor' WHERE parkingID = '$parkingID'";

		$execute = mysqli_query($conec, $sql);

		if ($execute) {
?>
			<script type="text/javascript">
				alert("Author updated succesfully");
			</script>
		<?php
			header('Location:authordisplay.php');
		} else {
		?>
			<script type="text/javascript">
				alert("Author update failed");
			</script>
	<?php
			header('Location:authordisplay.php');
		}
	}
	?>

	<div class="d-flex justify-content-center">
		<div class="card px-1 py-4 mt-5">
			<form action="" method="$_POST">
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