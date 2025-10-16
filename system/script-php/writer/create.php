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
			<form action="action-create.php?debug=debug&id_writer=<?php echo $id; ?>" method="get" enctype="multipart/form-data">
				<div class="add-new-comic-box">
					<section class="add-new-comic-box-metadata">
						<input type="text" name="title" id="input-comic"><br>
						<input type="number" name="page" id="input-comic"><br>
						<input type="number" name="price" id="input-comic"><br>
						<input type="text" name="writer" id="input-comic"><br>
						<input type="date" name="release_date" id="input-release-date"><br>
						<select name="genre" id="input-comic">
							<option value="comedy">comedy</option>
							<option value="romance">romance</option>
							<option value="adventure">adventure</option>
							<option value="sci-fi">sci-fi</option>
						</select><br>
						<textarea name="comment" id="input-comment">

						</textarea><br>
					</section>
					<section class="add-new-comic-box-source">
						<input type="file" name="image" id="hidden-gem">
						<button type="button" id="image-comic-btn">find comic</button>
						<input type="file" name="banner" id="hidden-gem">
						<button type="button" id="banner-comic-btn">find banner</button>

						<section class="image-viewer-section">
							<img src="#no-image-comic" id="comic-image-view">
							<img src="#no-image-banner" id="comic-banner-view">
						</section>
					</section>
				</div>
				<section class="upload-btn-comic-box">
					<button type="submit">add new comic</button>
					<button type="reset">reset</button>
					<a href="index.php?id=<?php echo $id; ?>"></a>
				</section>
			</form>
		</div>
		<script src="script.js"></script>
	</body>
</html>
