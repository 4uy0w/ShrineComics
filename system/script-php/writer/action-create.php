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

		$sql_query = "INSERT INTO comic (comic_title,comic_page,comic_price,comic_writer,comic_release_date,comic_genre,comic_comment) VALUES ('$ComicTitle',$ComicPage,$ComicPrice,'$ComicWriter','$ComicReleaseDate','$ComicGenre','$ComicComment')";
		$result = mysqli_query($server,$sql_query);

		if($result){
			echo "<script> window.alert('success to add new comic!'); </script>";
			header("Location: index.php?id=$id_writer&status_query=success_to_add");
		}else{
			echo "<script> window.alert('failed to add new comic!'); </script>";
			header("Location: index.php?id_writer=$id_writer&status_query=failed_to_add");
		}
	}
?>
