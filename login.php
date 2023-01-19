<?php
	session_start();
	include_once('connect.php');
	include_once('header.php');

	if (isset($_POST['adminLogin'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		function sanitize($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		// $password = sanitize($password);

		/**
		 * Verify a password against a stored hash
		 */
		function verify_password($entered_password, $stored_password){
			// Split the stored password into its salt and hash components
			list($salt, $hash) = explode(':', $stored_password);

			// Decode the salt from base64
			$salt = base64_decode($salt);

			// Verify the entered password using the stored salt and hash
			return password_verify($entered_password, $hash);
		}

		$stmt = $conn -> prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
		$stmt -> bind_param("ss", $username, $password);
		$stmt -> execute();
		$result = $stmt -> get_result();
		$row = $result -> fetch_assoc();
		$count = $result -> num_rows;
		$stmt -> close();

		if ($count == 1) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['admin'] = $row['adminID'];
			header('location: index.php');
		} else {
			echo "<script>alert('Invalid Email or Password');</script>";
		}
	}
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: index.php");
		exit;
	}

?>
<div class="row">
	<div class="col-12 d-flex justify-content-center">
		<form method="POST" action="">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Username</label>
				<input type="username" name="username" class="form-control" aria-describedby="email">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="d-flex justify-content-center">
				<input type="submit" name="adminLogin" class="btn btn-primary" value="Submit"></input>
			</div>
		</form>
	</div>
</div>

<?php
	include_once('footer.php');
?>