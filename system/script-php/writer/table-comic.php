<?php

	include "../../koneksi.php";

	$success = false;

	if($server){
		echo "<script> window.alert('berhasil terhubung dengan database'); </script>";
	}

	$search_user = mysqli_fetch_array(mysqli_query($server,"SELECT * FROM user WHERE user_id=$id_admin"));
	$user_username = $search_user["username"];

	$sql_query = "SELECT * FROM comic WHERE comic_writer='$user_username'";
	$result = mysqli_query($server,$sql_query);

	if($result){
		$success = true;
	}

?>

<section class="comic-area">
	<section class="comic-card-area">
		<?php
			while(($row = mysqli_fetch_array($result))){
				?>
				<section class="comic-card">
					<section class="comic-color-banner">
						<h2 id="comic-title"><?php echo $row["comic_title"]; ?></h2>
					</section>
					<section class="comic-content-desc">
						<section class="comic-desc-box">
							<section class="comic-banner-box">
								<img src="<?php echo $row['comic_banner']; ?>" id="image-banner">
							</section>
							<section class="comic-genre-box">
								<p id="text-genre"><b>Genre: </b><?php echo $row['comic_genre']; ?></p>
								<p id="text-genre"><b>Writer: </b><?php echo $row['comic_writer']; ?></p>
								<p id="text-genre"><b>Release Date: </b><?php echo $row['comic_release_date']; ?></p>
							</section>
						</section>
						<section class="comic-desc-text">
							<p><?php echo substr($row["comic_comment"],0,30); ?></p>
						</section>
					</section>
					<section class="comic-card-action">
						<a href="edit.php?id_comic=<?php echo $row['comic_id']; ?>&id_writer=<?php echo $id_admin; ?>"><button id="edit-btn">Edit</button></a>
						<a href="delete.php?id_comic=<?php echo $row['comic_id']; ?>&id_writer=<?php echo $id_admin; ?>"><button id="delete-btn">Delete</button></a><br>
						<a href="show.php?id_comic=<?php echo $row['comic_id']; ?>&id_writer=<?php echo $id_admin; ?>"><button id="show-btn">See</button></a>
					</section>
				</section>
				<?php
			}
		?>
	</section>
</section>