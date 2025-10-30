<?php

	include "../../koneksi.php";

	$comic_id = $_GET["comic_id"];
	$writer_id = $_GET["user_id"];

	$comic_data = null;

	$found_comic = false;
	$success_delete_chapter = false;

	$syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
	$result_search_comic = mysqli_query($server,$syntax_search_comic);

	if(mysqli_num_rows($result_search_comic) > 0){
		$found_comic = true;
		$comic_data = mysqli_fetch_array($result_search_comic);
	}

	$comic_name = $comic_data["comic_title"];
	$syntax_delete_chapter = "DELETE FROM chapter WHERE chapter_comic='$comic_name'";
	$result_delete_chapter = mysqli_query($server,$syntax_delete_chapter);

	if($result_delete_chapter){
		$success_delete_chapter = true;
	}

	if($success_delete_chapter){
		$syntax_delete_comic = "DELETE FROM comic WHERE comic_id=$comic_id";
		$result_delete_comic = mysqli_query($server,$syntax_delete_comic);

		if($result_delete_comic){
			header("Location: index.php?id=$writer_id");
		}
	}



?>
