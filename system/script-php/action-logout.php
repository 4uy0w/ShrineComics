<?php

	$id = $_GET["id"];

	include "../koneksi.php";

	$success_to_connect = false;
	$success_to_logout = false;

	if($server){
		$success_to_connect = true;
	}

	if($success_to_connect){
		$go_logout_sql = "UPDATE users SET status='LOGOUT' WHERE user_id='$id'";
	    $result = mysqli_query($server,$go_logout_sql);

		if($result){
			$success_to_logout = true;
		}
	}

	if($success_to_logout){
		header("Location: http://192.168.100.28/page/login/");
	}else{
		echo "<script> window.alert('Failed to logout!') </script>";
	}

?>
