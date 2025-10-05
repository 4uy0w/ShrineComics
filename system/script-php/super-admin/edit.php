<?php
	include "../../koneksi.php";

	$id = $_GET["id"];
	$id_super_admin = $_GET["id_admin"];

	$success_to_connect = false;
	$found_user = false;

	if($server){
		$success_to_connect = true;
	}

	$search_syntax = "SELECT * FROM user WHERE user_id=$id";
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
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Editing user: <?php echo $username; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="edit-area">
			<div class="edit-box">
				<div>
					<form action="../../action-edit.php?id=<?php echo $id ?>" method="post">
						<section class="input-box-area">
							<input type="text" id="username" name="username" value="<?php echo $username; ?>">
						<section>
						<section class="input-box-area">
							<input type="password" id="password" name="password" value="<?php echo $password; ?>">
						<section>
						<section class="input-box-area">
							<input type="email" id="email" name="email" value="<?php echo $email; ?>">
						<section>
						<section class="input-box-area">
							<input type="text" id="address" name="address" value="<?php echo $address; ?>">
						<section>
						<section class="input-box-area">
							<input type="text" id="telephone_number" name="telephone_number" value="<?php echo $telephone_number; ?>">
						<section>
						<section class="input-box-area">
							<select id="select-role" name="role">
								<option name="reader" <?= (($role == "reader") ? "selected" : "") ?> >reader</option>
								<option name="writer" <?= (($role == "writer") ? "selected" : "") ?> >writer</option>
							</select>
						<section>
						<section class="input-box-area">
							<input type="number" id="point" name="point" value="<?php echo $point; ?>">
						<section>
						<section class="submit-box-area">
							<button type="submit" id="submit">Submit</button>
						<section>
					</form>
				</div>
				<section class="cancel-area">
					<a href="index.php?id=<?php echo $id_super_admin; ?>"><button id="cancel-button">Cancel</button></a>
				</section>
			</div>
		</div>
	</body>
</html>
