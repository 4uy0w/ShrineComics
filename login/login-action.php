<?php

	$HOSTNAME = "localhost";
	$USERNAME = "Hikari";
	$PASSWORD = "123";
	$DATABASE = "ShrineComics";

	$server = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

	if($server){
		echo "<script>window.alert('Berhasil terhubung ke server database!');</script>";
	}else{
		$error_message = mysqli_error($server);
		echo "<script>window.alert('Error: $error_message');</script>";
	}

	$username = $_GET['username'];
	$password = $_GET['password'];
	$email = $_GET['email'];

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title> Welcome to Login </title>
	</head>
	<body>
		<h2>username: <?php echo $username; ?></h2>
		<h2>password: <?php echo $password; ?></h2>
		<h2>email: <?php echo $email; ?></h2>
		<a href="index.php"><button> back </button></a>
	</body>
</html>
