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
		$ComicImage = $_FILES["image"];
		$ComicBanner = $_FILES["banner"];

		$tmp_image = $ComicImage["tmp_name"];
		$tmp_banner = $ComicBanner["tmp_name"];

		$dirname = "../../../image/comic/";
		$dirname_banner = "../../../image/banner/";

		$new_image = $dirname . $ComicImage["name"];
		$new_banner = $dirname_banner . $ComicBanner["name"];

		$result_upload = move_uploaded_file($tmp_image,$new_image);
		if($result_upload){
			echo "<script> window.alert('success to upload comic!'); </script>";
		}

		$result_upload_banner = move_uploaded_file($tmp_banner,$new_banner);
		if($result_upload_banner){
			echo "<script> window.alert('success to upload banner!'); </script>";
		}

		$sql_query = "INSERT INTO comic (comic_title,comic_page,comic_price,comic_writer,comic_release_date,comic_genre,comic_comment,comic_image,comic_banner) VALUES ('$ComicTitle',$ComicPage,$ComicPrice,'$ComicWriter','$ComicReleaseDate','$ComicGenre','$ComicComment','$new_image','$new_banner')";
		$result = mysqli_query($server,$sql_query);

		if($result){
			header("Location: index.php?id=$id_writer&status_query=success_to_add");
		}else{
			header("Location: index.php?id_writer=$id_writer&status_query=failed_to_add");
		}
	}
?>
