<?php

	include "../../koneksi.php";

	$id = $_GET["id"];
	$id_super_admin = $_GET["id_admin"];

	$success_to_connect = false;

	if($server){
		$success_to_connect = true;
	}

	if($success_to_connect){
		$sql_syntax = "DELETE FROM user WHERE user_id=$id";
		$result = mysqli_query($server,$sql_syntax);

		if($result){
			header("Location: index.php?status=success_to_delete&id=$id_super_admin");
		}else{
			echo "<script> window.alert('failed to delete'); </script>";
		}
	}

?>
