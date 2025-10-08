<?php

	include "../../koneksi.php";

	$id_writer = $_GET["id_writer"];
	$id = $_GET["id_comic"];
	$debug_mode = $_GET["debug"];

	if($debug_mode == "debug"){
		$ComicTitle = $_POST["title"];
		$ComicPage = $_POST["page"];
		$ComicPrice = $_POST["price"];
		$ComicWriter = $_POST["writer"];
		$ComicReleaseDate = $_POST["release_date"];
		$ComicGenre = $_POST["genre"];
		$ComicComment = $_POST["comment"];

		$sql_query = "UPDATE comic SET comic_title='$ComicTitle',comic_page=$ComicPage,comic_price=$ComicPrice,comic_writer='$ComicWriter',comic_release_date='$ComicReleaseDate',comic_genre='$ComicGenre',comic_comment='$ComicComment' WHERE comic_id=$id";
		$result = mysqli_query($server,$sql_query);

		if($result){
			echo "<script> window.alert('success to edit comic!'); </script>";
			header("Location: index.php?id=$id_writer&status_query=success_to_add");
		}else{
			echo "<script> window.alert('failed to edit comic!'); </script>";
			header("Location: index.php?id_writer=$id_writer&status_query=failed_to_add");
		}
	}
?>
