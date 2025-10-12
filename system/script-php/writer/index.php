<?php

	$id_admin = $_GET["id"];

	include "../../koneksi.php";

	$sql_syntax_search_user = "SELECT * FROM user WHERE user_id=$id_admin";
	$sql_exec_search_user = mysqli_query($server,$sql_syntax_search_user);

	$row_search_user = mysqli_fetch_array($sql_exec_search_user);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Writer Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="writer-area">
			<div class="writer-box">
				<div class="writer-action-box">
					<div class="upload-comic-box">
						<section class="image-decoration-upload">
							<img src="../../../image/upload.svg" id="icon-upload">
						<section class="text-decoration-upload">
							<p>Upload new comic for everyone</p>
							<section class="button-action">
								<a href="create.php?id=<?php echo $id_admin?>"><button id="btn-action-upload">Upload</button></a>
							</section>
						</section>
					</div>
					<div class="statistic-comic-box">
						<section class="image-popular-comic">
							<img src="../../../image/eye.svg" id="icon-see">
						</section>
						<section class="text-popular-comic">
							<p>See most popular comic today, click me!</p>
							<section class="button-action">
								<a href="#see-popular"><button id="btn-action-see">See popular comic</button></a>
							</section>
						</section>
					</div>
				</div>
				<div class="box-join-date-area">
					<section class="join-date-box">
						<h4>Joined in:</h4>
						<h3><?php echo $row_search_user["join_date"]; ?></h3>
					</section>
				</div>
			</div>
			<div class="table-list-comic">
				<div class="table-area">
					<?php include "table-comic.php"; ?>
				</div>
			</div>
		</div>
		<script src="script.js">
		</script>
	</body>
</html>
