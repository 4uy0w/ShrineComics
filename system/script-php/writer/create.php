<!DOCTYPE HTML>

<?php

	$id = $_GET["id"];

	include "../../koneksi.php";

	$sql_syntax = "SELECT * FROM bundle_comic";
	$result_list_chapter = mysqli_query($server,$sql_syntax);

?>

<html>
	<head>
		<title>Add New Comic</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="add-new-comic-area">
			<center><h1 id="heading-title-page">Create New Comic</h1></center>
			<form action="action-create.php?debug=debug&id_writer=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
				<div class="add-new-comic-box">
					<section class="add-new-comic-box-metadata">
						<p id="title-input">comic title</p>
						<input type="text" name="title" id="input-comic" placeholder="comic title"><br>
						<p id="title-input">comic page</p>
						<input type="number" name="page" id="input-comic" placeholder="comic page"><br>
						<p id="title-input">comic price</p>
						<input type="number" name="price" id="input-comic" placeholder="comic price"><br>
						<p id="title-input">comic writer</p>
						<input type="text" name="writer" id="input-comic" placeholder="writer"><br>
						<p id="title-input">comic release date</p>
						<input type="date" name="release_date" id="input-release-date"><br>
						<p id="title-input">comic genre</p>
						<select name="genre" id="select-genre">
							<option value="comedy">comedy</option>
							<option value="romance">romance</option>
							<option value="adventure">adventure</option>
							<option value="sci-fi">sci-fi</option>
						</select><br>
						<p id="title-input">comic chapter</p>
						<select name="chapter" id="select-genre">
							<?php 
								while(($row = mysqli_fetch_array($result_list_chapter))){
									?>
									<option value="<?php echo $row['bundle_comic_name']?>"><?php echo $row["bundle_comic_name"]; ?></option>
									<?php 
								}
							?>
							<option value="no-chapter" selected>--- no chapter ---</option>
						</select><br>
						<p id="title-input">comic comment</p>
						<textarea name="comment" id="input-comment" placeholder="comic comment"></textarea><br>
					</section>
					<section class="add-new-comic-box-source">
						<section class="upload-source">
							<input type="file" name="image" id="hidden-gem-image">
							<button type="button" id="image-comic-btn"><b>find comic</b></button>
							<input type="file" name="banner" id="hidden-gem-banner">
							<button type="button" id="banner-comic-btn"><b>find banner</b></button>
						</section>
						<section class="image-viewer-section">
							<section class="image-view-container">
								<img src="../../../image/no-image.png" id="comic-image-view">
								<img src="../../../image/no-image.png" id="comic-banner-view">
							</section>
						</section>
						<section class="upload-btn-comic-box">
							<button type="submit" id="submit-btn"><b id="bold-text-button">add new comic</b></button>
							<button type="reset" id="reset-btn"><b id="bold-text-button">reset</b></button>
							<a href="index.php?id=<?php echo $id; ?>"><button type="button" id="back-btn"><b id="bold-text-button">back</b></button></a>
						</section>
					</section>
				</div>
			</form>
		</div>
		<script src="script.js"></script>
	</body>
</html>
