<!DOCTYPE HTML>

<?php

	$id = $_GET["id"];

?>

<html>
	<head>
		<title>Add New Comic</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="add-new-comic-area">
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
						<p id="title-input">comic comment</p>
						<textarea name="comment" id="input-comment" placeholder="comic comment"></textarea><br>
					</section>
					<section class="add-new-comic-box-source">
						<section class="upload-source">
							<input type="file" name="image" id="hidden-gem-image">
							<button type="button" id="image-comic-btn">find comic</button>
							<input type="file" name="banner" id="hidden-gem-banner">
							<button type="button" id="banner-comic-btn">find banner</button>
						</section>
						<section class="image-viewer-section">
							<section class="image-view-container">
								<img src="../../../image/no-image.png" id="comic-image-view">
								<img src="../../../image/no-image.png" id="comic-banner-view">
							</section>
						</section>
						<section class="upload-btn-comic-box">
							<button type="submit" id="submit-btn">add new comic</button>
							<button type="reset" id="reset-btn">reset</button>
							<a href="index.php?id=<?php echo $id; ?>"><button type="button" id="back-btn">back</button></a>
						</section>
					</section>
				</div>
			</form>
		</div>
		<script src="script.js"></script>
	</body>
</html>
