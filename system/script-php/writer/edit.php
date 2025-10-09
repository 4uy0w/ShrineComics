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

<!DOCTYPE HTML>

<html>
	<head>
		<title>Edit Comic</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="add-new-comic-area">
			<div class="add-new-comic-box">
				<form action="action-edit.php?debug=debug&id_writer=<?php echo $id_admin; ?>&id_comic=<?php echo $id_comic; ?>" method="post" enctype="multipart/form-data">
					<section class="input-area">
						<input type="text" name="title" id="comic-title" placeholder="title" value="<?php echo $row["comic_title"];?>">
					</section>
					<section class="input-area">
						<input type="number" name="page" id="comic-page" placeholder="page" value="<?php echo $row["comic_page"];?>">
					</section>
					<section class="input-area">
						<input type="number" name="price" id="comic-price" placeholder="price" value="<?php echo $row["comic_price"];?>">
					</section>
					<section class="input-area">
						<input type="text" name="writer" id="comic-writer" placeholder="writer" value="<?php echo $row["comic_writer"];?>">
					</section>
					<section class="input-area">
						<input type="date" name="release_date" id="comic-release-date" value="<?php echo $row["comic_release_date"];?>">
					</section>
					<section class="input-area">
						<select name="genre" id="comic-genre">
							<option value="sci-fi" <?php ($row["comic_genre"] == "sci-fi" ? "selected" : ""); ?>>sci-fi</option>
							<option value="comedy" <?php ($row["comic_genre"] == "comedy" ? "selected" : ""); ?>>comedy</option>
							<option value="adventure" <?php ($row["comic_genre"] == "adventure" ? "selected" : ""); ?>>adventure</option>
							<option value="romance" <?php ($row["comic_genre"] == "romance" ? "selected" : ""); ?>>romance</option>
						</select>
					</section>
					<section class="input-area">
						<textarea name="comment" id="comic-comment">
							<?php echo $row["comic_comment"];?>
						</textarea>
					</section>
					<section class="button-action">
						<button type="submit" id="submit-btn">submit</button>
						<button type="reset" id="reset-btn">reset</button>
						<a href="index.php?id=<?php echo $id_admin; ?>"><button type="button" id="back-btn">back</button></a>
					</section>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>

