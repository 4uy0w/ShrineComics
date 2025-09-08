<?php
	include "../../system/koneksi.php";

	if($server){
		echo "<script> window.alert('berhasil terhubung dengan server database'); </script>";
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$telephone_number = $_POST['telephone'];
	$role = $_POST['role'];

	$search_user = "SELECT * FROM user WHERE username='$username' OR email='$email' OR telephone_number='$telephone_number'";
	$sql_exec = mysqli_query($server,$search_user);

	if(mysqli_num_rows($sql_exec) > 0){
		echo "<script> window.alert('username telah terdaftar!'); </script>";
		echo "<script> window.location.href = 'index.html?error=invalid_user'; </script>";
	}else{
		$insert_user = "INSERT INTO user (username,password,email,address,telephone_number,role) VALUES ('$username','$password','$email','$address','$telephone_number','$role')";
		$sql_exec = mysqli_query($server,$insert_user);

		if($sql_exec){
			echo "<script> window.alert('berhasil menambahkan user!'); </script>";
		}
	}
?>

<html>
	<head>
		<title>Submit!</title>
	</head>
	<body>
		<h2>username : <?php echo $username?></h2>
		<h2>password : <?php echo $password?></h2>
		<h2>email : <?php echo $email?></h2>
		<h2>address : <?php echo $address?></h2>
		<h2>telephone number : <?php echo $telephone_number?></h2>
		<h2>role : <?php echo $role?></h2>
	</body>
</html>
