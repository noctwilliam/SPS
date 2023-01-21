<?php
include_once('header.php');

if (isset($_SESSION['admin'])) {
	$stmt = $conn->prepare("SELECT * FROM customer");
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$count = $result->num_rows;
	$stmt->close();
?>

	<table class="table table-striped table-hover">
	<thead>
		<?php foreach ($row as $key => $value) { ?>
			<th><?php echo $key; ?></th>
		<?php } ?>
		<th>Actions</th>
	</thead>
	<tbody class="table-group-divider">
		<?php for ($i = 0; $i < $count; $i++) { ?>
			<tr>
				<?php foreach ($row as $key => $value) { ?>
					<td><?php echo $row[$key]; ?></td>
				<?php } ?>
			<!-- </tr> -->
			<td>
				<a href="customer-edit.php?parkingID=<?= $row['parkingID']; ?>" class="btn btn-primary">Edit</a>
				<a onclick="confirm('Are you sure you want to delete this reservation?')" href="customer-delete.php?parkingID=<?= $row['parkingID']; ?>" class="btn btn-danger">Delete</a>
			</td>
			<?php $row = $result->fetch_assoc(); ?> <!-- to fetch the next table in data -->
			</tr>
		<?php } ?>
	</tbody>
	</table>

<?php
} else {
	header('location: login.php');
}
include_once('footer.php');
?>