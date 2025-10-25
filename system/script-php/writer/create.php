<?php

	include "../../koneksi.php";

	$user_id = $_GET["user_id"];

	$valid_user = false;

	// validasi user
	$syntax_validate_user = "SELECT * FROM users WHERE user_id=$user_id";
	$result_validate_user = mysqli_query($server,$syntax_validate_user);

	if(mysqli_num_rows($result_validate_user) > 0){
		$valid_user = true;
	}

	// fetch data dari operasi
	$user_data = mysqli_fetch_array($result_validate_user);

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Create comic page <?php echo $user_data["username"]; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="create-comic-area">
			<div class="create-comic-box">
				<center>
					<h2 id="header-title-create">Create New Comic</h2>
				</center>
				<div class="create-comic-form">
					<form action="create-comic.php?user_id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
						<div class="create-comic-metadata-box">
							<section class="input-area">
								<p id="text-input">comic title</p>
								<input type="text" name="comic_title" id="input-box" placeholder="comic title">
							</section>
							<section class="input-area">
								<p id="text-input">comic writer</p>
								<input type="text" name="comic_writer" id="input-box" value="<?php echo $user_data['username']; ?>" placeholder="comic writer">
							</section>
							<section class="input-area">
								<p id="text-input">comic price</p>
								<input type="number" name="comic_price" id="input-box" placeholder="comic price">
							</section>
							<p id="text-input">comic banner</p>
							<section class="upload-banner-section">
								<section class="input-area">
									<input type="file" name="comic_banner" id="invisible-box-banner">
									<button type="button" id="comic-upload-banner-button">Upload Banner</button>
								</section>
							</section>
							<section class="input-area">
								<p id="text-input">comic comment</p> 	
								<textarea name="comic_comment" id="comment-box"></textarea>
							</section>
							<section class="button-action-box">
								<button type="submit" id="submit-button-create-comic">Create</button>
								<a href="index.php?id=<?php echo $user_id; ?>"><button type="button" id="cancel-button-create">Discard</button></a>
							</section>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>