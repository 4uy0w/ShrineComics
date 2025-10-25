<?php
	include "../koneksi.php";

	if($server){
		echo "<script> window.alert('berhasil terhubung dengan server database'); </script>";
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$telephone_number = $_POST['telephone'];
	$file_upload = $_FILES['photo-profile']['tmp_name'];

	$search_user = "SELECT * FROM users WHERE username='$username' OR email='$email' OR telephone_number='$telephone_number'";
	$sql_exec = mysqli_query($server,$search_user);

	if(mysqli_num_rows($sql_exec) > 0){
		echo "<script> window.alert('username telah terdaftar!'); </script>";
		echo "<script> window.alert('image: $file_upload'); </script>";
		echo "<script> window.location.href = 'http://127.0.0.1/page/register/index.html?error_message=username_already_exists&username=$username&password=$password&email=$email&address=$address&telephone_number=$telephone_number&role=$role'; </script>";
	}else{
		$insert_user = "INSERT INTO users (username,password,email,address,telephone_number,role,join_date) VALUES ('$username','$password','$email','$address','$telephone_number','reader',CURDATE())";
		$sql_exec = mysqli_query($server,$insert_user);

		if($sql_exec){
			echo "<script> window.alert('berhasil menambahkan user!'); </script>";
			echo "<script> window.location.href = 'http://127.0.0.1/page/login/'; </script>";
		}
	}
?>
