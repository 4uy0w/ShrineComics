<?php

	include "../koneksi.php";

	$sql_syntax = "SELECT * FROM user";

	$result = mysqli_query($server,$sql_syntax);

?>

<!DOCTYPE HTML>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://192.168.100.28/page/super-admin/style.css">
	</head>
	<body>
		<table border="1px solid black">
			<tr>
				<th>username</th>
				<th>password</th>
				<th>email</th>
				<th>address</th>
				<th>no.telp</th>
				<th>role</th>
				<th>action</th>
			<tr>
			<?php

				while(($row = mysqli_fetch_array($result))){
					?>
					<tr>
						<td id="col-username"><?php echo $row["username"]; ?></td>
						<td id="col-password"><?php echo $row["password"]; ?></td>
						<td id="col-email"><?php echo $row["email"]; ?></td>
						<td id="col-address"><?php echo $row["address"]; ?></td>
						<td id="col-telephone-number"><?php echo $row["telephone_number"]; ?></td>
						<td id="col-role"><?php echo $row["role"]; ?></td>
						<td id="col-action">
							<a href="edit-user.php"><button type="button" id="button-edit-user">Edit</button></a>
							<a href="delete-user.php"><button type="button" id="button-delete-user">Delete</button></a>
						</td>
					</tr>
					<?php
				}
			?>
		</table>
	</body>
</html>
