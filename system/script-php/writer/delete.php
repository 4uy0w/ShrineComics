<?php

	include "../../koneksi.php";

	$id_comic = $_GET["id_comic"];
	$id_writer = $_GET["id_writer"];

	$sql_query = "DELETE FROM comic WHERE comic_id=$id_comic";
	$result = mysqli_query($server,$sql_query);

	if($result){
		header("Locations: index.php?id_writer=$id_writer&status_query=success_to_delete");
	}else{
		echo "<script> window.alert('failed to delete!'); </script>";
		header("Locations: index.php?id_writer=$id_writer&status_query=failed_to_delete");
	}
?>
