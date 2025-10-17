<?php

	include "../../koneksi.php";

	$id_comic = $_GET["id_comic"];
	$id_admin = $_GET["id_writer"];

	$sql_query = "SELECT * FROM comic WHERE comic_id=$id_comic";
	$result = mysqli_query($server,$sql_query);

	$row = null;

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
		}
	}

?>

<html>
	<head>
		<title>Add New Comic</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="add-new-comic-area">
			<center><h1 id="heading-title-page">Edit Comic</h1></center>
			<form action="action-edit.php?debug=debug&id_writer=<?php echo $id_admin; ?>&id_comic=<?php echo $id_comic; ?>" method="post" enctype="multipart/form-data">
				<div class="add-new-comic-box">
					<section class="add-new-comic-box-metadata">
						<p id="title-input">comic title</p>
						<input type="text" name="title" id="input-comic" placeholder="comic title" value="<?php echo $row['comic_title']; ?>"><br>
						<p id="title-input">comic page</p>
						<input type="number" name="page" id="input-comic" placeholder="comic page" value="<?php echo $row['comic_page']; ?>"><br>
						<p id="title-input">comic price</p>
						<input type="number" name="price" id="input-comic" placeholder="comic price" value="<?php echo $row['comic_price']; ?>"><br>
						<p id="title-input">comic writer</p>
						<input type="text" name="writer" id="input-comic" placeholder="writer" value="<?php echo $row['comic_writer']; ?>"><br>
						<p id="title-input">comic release date</p>
						<input type="date" name="release_date" id="input-release-date" value="<?php echo $row['comic_release_date']; ?>"><br>
						<p id="title-input">comic genre</p>
						<select name="genre" id="select-genre">
							<option value="comedy" <?php echo ($row['comic_genre'] == 'comedy' ? 'selected' : '') ?>>comedy</option>
							<option value="romance" <?php echo ($row['comic_genre'] == 'romance' ? 'selected' : '') ?>>romance</option>
							<option value="adventure" <?php echo ($row['comic_genre'] == 'adventure' ? 'selected' : '') ?>>adventure</option>
							<option value="sci-fi" <?php echo ($row['comic_genre'] == 'sci-fi' ? 'selected' : '') ?>>sci-fi</option>
						</select><br>
						<p id="title-input">comic comment</p>
						<textarea name="comment" id="input-comment" placeholder="comic comment"><?php echo $row['comic_comment']; ?></textarea><br>
					</section>
					<section class="add-new-comic-box-source">
						<section class="image-viewer-section">
							<section class="image-view-container">
								<img src="<?php echo $row['comic_image']; ?>" id="comic-image-view">
								<img src="<?php echo $row['comic_banner']; ?>" id="comic-banner-view">
							</section>
						</section>
						<section class="upload-btn-comic-box">
							<button type="submit" id="submit-btn"><b id="bold-text-button">edit comic</b></button>
							<button type="reset" id="reset-btn-edit"><b id="bold-text-button">reset</b></button>
							<a href="index.php?id=<?php echo $id_admin; ?>"><button type="button" id="back-btn"><b id="bold-text-button">back</b></button></a>
						</section>
					</section>
				</div>
			</form>
		</div>
		<script src="script.js">SaveContentLoaded();</script>
	</body>
</html>
