<?php

	include "../system/koneksi.php";

	if($server && $SUCCESS_CONNECT){
		echo "<script> window.alert('Berhasil terhubung dengan server!'); </script>";
	}

	$username = $_GET['username'];
	$password = $_GET['password'];
	$email = $_GET['email'];

	$message = "no message";

	$query_search = "SELECT * FROM user WHERE username='$username' AND password='$password' AND email='$email'";
	$exec_query = mysqli_query($server,$query_search);

	if(mysqli_num_rows($exec_query) > 0){
		$message = "found user";
	}else{
		$message = "user not found!";
	}

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
		<h3> <?php echo $message; ?> </h3>
		<a href="index.php"><button> back </button></a>
	</body>
</html>
