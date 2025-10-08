<?php

	include "../../koneksi.php";

	$id_writer = $_GET["id_writer"];
	$debug_mode = $_GET["debug"];

	if($debug_mode == "debug"){
		$ComicTitle = $_POST["title"];
		$ComicPage = $_POST["page"];
		$ComicPrice = $_POST["price"];
		$ComicWriter = $_POST["writer"];
		$ComicReleaseDate = $_POST["release_date"];
		$ComicGenre = $_POST["genre"];
		$ComicComment = $_POST["comment"];

		$sql_query = "INSERT INTO comic (comic_title,comic_page,comic_price,comic_writer,comic_release_date,comic_genre,comic_comment) VALUES ('$ComicTitle',$ComicPage,$ComicPrice,'$ComicWriter','$ComicReleaseDate','$ComicComment')";
		$result = mysqli_query($server,$sql_query);

		if($result){
			header("Locations: index.php?id_writer=$id_writer&status_query=success_to_add");
		}else{
			echo "<script> window.alert('failed to add new comic!'); </script>";
			header("Locations: index.php?id_writer=$id_writer&status_query=failed_to_add");
		}
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Add New Comic</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="add-new-comic-area">
			<div class="add-new-comic-box">
				<form action="create.php?debug=debug" method="post" enctype="multipart/form-data">
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
							<option value="comedy">comedy</option>
							<option value="adventure">adventure</option>
							<option value="romance">romance</option>
						</select>
					</section>
					<section class="input-area">
						<textarea name="comment" id="comic-comment">
						</textarea>
					</section>
					<section class="button-action">
						<button type="submit" id="submit-btn">submit</button>
					</section>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
