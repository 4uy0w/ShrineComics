<?php
	include "../../koneksi.php";

	$success_to_connect = false;

	$id_super_admin = $_GET["id"];

	if($server){
		$success_to_connect = true;
	}

	$result = null;
	$failed_to_get_user = false;
	$failed_to_login = false;

	if($success_to_connect){
		$sql_syntax = "SELECT * FROM user";
		$result = mysqli_query($server,$sql_syntax);


		if(mysqli_num_rows(($res = mysqli_query($server,"SELECT * FROM super_admin WHERE super_id=$id_super_admin"))) > 0){
			$row_admin = mysqli_fetch_array($res);

			$login_super_admin = "UPDATE super_admin SET status='LOGIN' WHERE super_id=$id_super_admin";
			$result_login = mysqli_query($server,$login_super_admin);

			if(!$result_login){
				$failed_to_login = true;
			}
		}else{
			echo "<script> window.alert('Failed to Login 1!'); </script>";
			header("Location: http://127.0.0.1/page/login");
		}

		if(!$result){
			$failed_to_get_user = true;
		}
	}



	if($failed_to_login){
		echo "<script> window.alert('Failed to Login 2!'); </script>";
		header("Location: http://127.0.0.1/page/login");
	}

	$status = $_GET["status"];
	if($status == "success_to_delete"){
		echo "<script> window.alert('success to delete user'); </script>";
	}else if($status == "success_to_edit"){
		echo "<script> window.alert('success to edit user'); </script>";
	}

	if($status == "failed_to_delete"){
		echo "<script> window.alert('failed to delete user'); </script>";
	}else if($status == "failed_to_edit"){
		echo "<script> window.alert('failed to edit user'); </script>";
	}else if($status == "user_not_found"){
		echo "<script> window.alert('user no found in database'); </script>";
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>ShrineComics Super Admin Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="menu-navbar">
			<div class="button-action">
				<a href="logout.php?id=<?php echo $id_super_admin; ?>"><button id="action-logout">Log Out</button></a>
			</div>
		</div>
		<div class="control-panel-area">
			<div class="control-panel-box">
				<div class="table-area">
					<table border="1px solid black" id="tb-data">
						<tr>
							<th>id</th>
							<th>username</th>
							<th>pasword</th>
							<th>email</th>
							<th>address</th>
							<th>point</th>
							<th>role</th>
							<th>telephone number</th>
							<th>action</th>
						</tr>
						<?php
							while(($row = mysqli_fetch_array($result))){
								?>
								<tr>
									<td id="row-data"><?php echo $row["user_id"]; ?></td>
									<td id="row-data"><?php echo $row["username"]; ?></td>
									<td id="row-data"><?php echo $row["password"]; ?></td>
									<td id="row-data"><?php echo $row["email"]; ?></td>
									<td id="row-data"><?php echo $row["address"]; ?></td>
									<td id="row-data"><?php echo $row["point"]; ?></td>
									<td id="row-data"><?php echo $row["role"]; ?></td>
									<td id="row-data"><?php echo $row["telephone_number"]; ?></td>
									<td id="action-row">
										<a href="delete.php?id=<?php echo $row['user_id']; ?>&id_admin=<?php echo $id_super_admin; ?>"><button id="action-delete">Hapus</button></a>
										<a href="edit.php?id=<?php echo $row['user_id']; ?>&id_admin=<?php echo $id_super_admin; ?>"><button id="action-edit">Edit</button></a>
										<a href="show.php?id=<?php echo $row['user_id']; ?>&id_admin=<?php echo $id_super_admin; ?>"><button id="action-show">Lihat</button></a>
									</td>
								</tr>
								<?php
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
