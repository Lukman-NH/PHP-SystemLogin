<?php 
session_start();
if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

require 'function.php';

if (isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if ( mysqli_num_rows($result) == 1){

		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){

			// set session
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>

	<style type="text/css">
		label {
			display: block;
		}
	</style>
</head>
<body>
<h1>Login</h1>

<?php if(isset($error)) : ?>
	<p style="color: red; font-style: italic;">Username / Password Salah</p>
<?php endif; ?>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username"> Username :</label>
				<input type="text" name="username" id="username">	
			</li>
			<li>
				<label for="password"> Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<br>
			<li>	
			<button type="submit" name="login"> Login </button>
			</li>
		</ul>
	</form>


</body>
</html>