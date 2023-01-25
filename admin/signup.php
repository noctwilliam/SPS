<?php
include_once('connect.php');
include_once('header.php');

if (isset($_POST['signup'])){
	function hash_password($password){
		// Use a random salt to make the hash more difficult to crack
		$salt = random_bytes(16);

		// Use the Argon2i variant of Argon2 with 5 memory cost and 2 time cost
		$hash = password_hash($password, PASSWORD_ARGON2I, [
			'memory_cost' => 5,
			'time_cost' => 2,
			'salt' => $salt
		]);

		// Check that the hash was created successfully
		if ($hash === false) {
			// If the hash function failed, return an error
			return 'Error creating hash';
		}

		// Return the salt and hashed password as a string, separated by a ':' character
		return base64_encode($salt) . ':' . $hash;
	}
	$password = hash_password($password);

	$sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
	$stmt = $conn -> prepare($sql);
	$stmt -> bind_param("ss", $username, $password);
	$stmt -> execute();
	$stmt -> close();
}

?>

<div class="row">
	<div class="col-12 mx-auto">
		<form method="POST">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Username</label>
				<input type="username" name="username" class="form-control" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" name="adminSignup" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>