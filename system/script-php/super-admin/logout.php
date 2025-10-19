<?php

	$id = $_GET["id"];

	include "../../koneksi.php";

	$success_to_connect = false;
	$success_to_logout = false;

	if($server){
		$success_to_connect = true;
	}

	if(mysqli_num_rows(mysqli_query($server,"SELECT * FROM super_admin WHERE super_id=$id")) > 0){
		echo "<script> window.alert('Found user!'); </script>";
	}else{
		echo "<script> window.alert('user not found!'); </script>";
	}

	if($success_to_connect){
		$go_logout_sql = "UPDATE super_admin SET status='LOGOUT' WHERE super_id=$id";
	    $result = mysqli_query($server,$go_logout_sql);

		if($result){
			$success_to_logout = true;
		}
	}

	if($success_to_logout){
		echo "<script> window.alert('Success to logout!'); </script>";
		header("Location: http://127.0.0.1/page/login/");
	}else{
		echo "<script> window.alert('Failed to logout!'); </script>";
	}

?>
