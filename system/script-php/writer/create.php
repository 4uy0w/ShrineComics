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
					<section class="section-add-new-comic">
						<input type="text" name="title" id="input-comic" placeholder="comic title"><br>
						<input type="number" name="page" id="input-comic" placeholder="comic page"><br>
						<input type="number" name="price" id="input-comic" placeholder="comic price"><br>
						<input type="text" name="writer" id="input-comic" placeholder="comic writer"><br>
						<select name="genre" id="select-genre">
							<option value="romance">romance</option>
							<option value="comedy">comedy</option>
							<option value="adventure">adventure</option>
							<option value="sci-fi">sci-fi</option>
						</select><br>
						<input type="date" name="release_date" id="input-comic"><br>
						<textarea name="comment" id="textarea-comment">

						</textarea><br>
						<section class="box-btn">
							<input type="file" name="image" id="comic-hidden-image">
							<input type="button" value="Upload Comic" id="btn-upload-comic">
							<input type="file" name="banner" id="comic-hidden-banner">
							<input type="button" value="Upload Banner" id="btn-upload-banner"><br>
							<section class="box-preview-banner">
								<img src="#no-preview" alt="preview banner" id="image-banner-preview">
							</section>
							<section class="image-comic-desc">
								<img src="#no-image" alt="comic image" id="image-comic-preview">
							</section>
						</section>
						<button type="submit" id="btn-submit">add new</button>
						<button type="reset" id="btn-reset">reset</button>
						<a href="index.php?id=<?php echo $id; ?>"><button>back</button></a>
					</section>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
