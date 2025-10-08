<?php

	$id_admin = $_GET["id"];

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
							<p> Upload new comic </p>
						</section>
						<section class="text-decoration-upload">
							<p>Upload new comic for everyone</p>
							<section class="button-action">
								<a href="create.php?id=<?php echo $id_admin?>"><button id="btn-action">Upload</button></a>
							</section>
						</section>
					</div>
					<div class="statistic-comic-box">
						<section class="image-popular-comic">
							<p id="count-view-text">view</p>
						</section>
						<section id="text-popular-comic">
							<p>Most popular comic today is:</p>
							<p id="popular-comic-title"><b>comic</b></p>
							<section class="button-action">
								<a href="#see-popular"><button id="btn-action">See popular comic</button></a>
							</section>
						</section>
					</div>
				</div>
				<div class="table-list-comic">
					<div class="table-area">
						<?php include "table-comic.php"; ?>
					</div>
				</div>
			</div>
		</div>
		<script src="script.js">
		</script>
	</body>
</html>
