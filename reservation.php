<?php
session_start();
include_once('header.php');

if (isset($_SESSION['admin'])) {
	$stmt = $conn->prepare("SELECT * FROM reservation");
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$count = $result->num_rows;
	$stmt->close();

	// create a method to alter the time format of the reservation
	function formatTime($time) {
		$hour = substr($time, 0, 2);
		$minute = substr($time, 3, 2);
		// $second = substr($time, 6, 2);
		$meridian = " AM";
		if ($hour > 12) {
			$hour -= 12;
			$meridian = " PM";
		}
		return $hour . ":" . $minute . $meridian;
	}
?>

	<table class="table table-striped table-hover">
		<thead>
			<?php foreach ($row as $key => $value) { ?>
				<th><?php echo $key; ?></th>
			<?php } ?>
			<th>Actions</th>
		</thead>
		<tbody>
			<?php for ($i = 0; $i < $count; $i++) { ?>
				<tr>
					<?php foreach ($row as $key => $value) { ?>
						<td>
							<?php
								if ($key == "time") {
									echo formatTime($row[$key]);
								} else {
									echo $row[$key];
								}
							?>
						</td>
					<?php } ?>
					<!-- </tr> -->
					<td>
						<a href="reservation-edit.php?reservationID=<?php echo $row['reservationID']; ?>" class="btn btn-primary">Edit</a>
						<a onclick="confirm('Are you sure you want to delete this reservation?')" href="reservation-delete.php?reservationID=<?php echo $row['reservationID']; ?>" class="btn btn-danger">Delete</a>
					</td>
					<?php $row = $result->fetch_assoc(); ?> <!-- to fetch the next data in the table -->
				</tr>
			<?php } ?>
		</tbody>
	</table>

<?php
}
else {
	header('location: login.php');
}
include_once('footer.php');
?>