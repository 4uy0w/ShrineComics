<?php

	include "../koneksi.php";

	$id = $_GET["id"];
	$id_super_admin = $_GET["id_admin"];

	if($server){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$username = $_POST["username"];
			$password = $_POST["password"];
			$email = $_POST["email"];
			$telephone_number = $_POST["telephone_number"];
			$address = $_POST["address"];
			$role = $_POST["role"];
			$point = $_POST["point"];

			$syntax_update = "UPDATE user SET username='$username',password='$password',email='$email',telephone_number='$telephone_number',address='$address',role='$role',point='$point' WHERE user_id=$id";

			$result = mysqli_query($server,$syntax_update);

			if($result){
				header("Location: super-admin/index.php?status=success_to_edit&id=$id");
			}else{
				header("Location: index.php?status=failed_to_delete");
			}
		}else{
			echo "only serving POST request <br>";
		}
	}else{
		echo "failed to connect into server <br>";
	}

?>
