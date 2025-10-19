<?php
	include "../../koneksi.php";

	$id = $_GET["id"];
	$id_admin = $_GET["id_admin"];

	$success_to_connect = false;
	$found_user = false;

	if($server){
		$success_to_connect = true;
	}

	$search_syntax = "SELECT * FROM users WHERE user_id=$id";
	$result_search = mysqli_query($server,$search_syntax);

	if(mysqli_num_rows($result_search) > 0){
		$found_user = true;
	}else{
		header("Location: index.php?status=user_not_found");
	}

	$username = null;
	$password = null;
	$email = null;
	$address = null;
	$telephone_number = null;
	$role = null;
	$status = null;
	$point = null;

	if($found_user){
		$row = mysqli_fetch_array($result_search);

		$username = $row["username"];
		$password = $row["password"];
		$email = $row["email"];
		$address = $row["address"];
		$telephone_number = $row["telephone_number"];
		$role = $row["role"];
		$point = $row["point"];
		$status = $row["status"];
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Detail of <?php echo $username?></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="show-area">
			<div class="show-box">
				<section class="show-content">
					<p><b>username: </b><?php echo $username; ?></p>
					<p><b>password: </b><?php echo $password; ?></p>
					<p><b>email: </b><?php echo $email; ?></p>
					<p><b>address: </b><?php echo $address; ?></p>
					<p><b>role: </b><?php echo $role; ?></p>
					<p><b>point: </b><?php echo $point; ?></p>
					<p><b>status: </b><?php echo $status; ?></p>
				</section>
				<section class="action-box">
					<a href="edit.php?id=<?php echo $id?>&id_admin=<?php echo $id_admin?>"><button id="edit-button">Edit</button></a>
					<a href="delete.php?id=<?php echo $id?>&id_admin=<?php echo $id_admin?>"><button id="delete-button">Delete</button></a>
					<a href="index.php?id=<?php echo $id_admin; ?>"><button id="back-button">Back</button></a>
				</section>
			</div>
		</div>
	</body>
</html>
