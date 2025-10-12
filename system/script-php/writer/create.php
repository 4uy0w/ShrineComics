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
			<div class="add-new-comic-box">
				<form action="action-create.php?debug=debug&id_writer=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
					<section class="input-area">
						<input type="text" name="title" id="comic-title" placeholder="title">
					</section>
					<section class="input-area">
						<input type="number" name="page" id="comic-page" placeholder="page">
					</section>
					<section class="input-area">
						<input type="number" name="price" id="comic-price" placeholder="price">
					</section>
					<section class="input-area">
						<input type="text" name="writer" id="comic-writer" placeholder="writer">
					</section>
					<section class="input-area">
						<input type="date" name="release_date" id="comic-release-date">
					</section>
					<section class="input-area">
						<select name="genre" id="comic-genre">
							<option value="sci-fi">sci-fi</option>
							<option value="comedy" selected>comedy</option>
							<option value="adventure">adventure</option>
							<option value="romance">romance</option>
						</select>
					</section>
					<section class="input-area">
						<textarea name="comment" id="comic-comment">
						</textarea>
					</section>
					<section class="input-area">
						<input type="file" name="image" id="comic-image" style="display: none;">
						<input type="button" value="upload image" id="upload-image-btn">
						<img src="#default" id="image-comic">
					</section>
					<section class="input-area">
						<input type="file" name="banner" id="comic-banner" style="display: none;">
						<input type="button" value="upload banner" id="upload-banner-btn">
						<img src="#default" id="image-banner">
					</section>
					<section class="button-action">
						<button type="submit" id="submit-btn">submit</button>
						<button type="reset" id="reset-btn">reset</button>
						<a href="index.php?id=<?php echo $id; ?>"><button type="button" id="back-btn">back</button></a>
					</section>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
