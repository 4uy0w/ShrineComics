<?php

	include "../../koneksi.php";

	$success = false;

	if($server){
		echo "<script> window.alert('berhasil terhubung dengan database'); </script>";
	}

	$sql_query = "SELECT comic_title,comic_writer,comic_genre FROM comic";
	$result = mysqli_query($server,$sql_query);

	if($result){
		$success = true;
	}

?>

<table border="1px solid black" class="table-comic">
	<tr>
		<th>Title</th>
		<th>Writer</th>
		<th>Genre</th>
		<th>Action</th>
	</tr>
	<?php

		while(($row = mysqli_fetch_array($result))){
			?>
			<tr>
				<td><?php echo $row["comic_title"]; ?></td>
				<td><?php echo $row["comic_writer"]; ?></td>
				<td><?php echo $row["comic_genre"]; ?></td>
				<td>
					<a href="#delete"><button id="delete-comic-btn">Delete</button></a>
					<a href="#edit"><button id="edit-comic-btn">Edit</button></a>
					<a href="#see"><button id="see-comic-btn">See</button></a>
				</td>
			</tr>
			<?php
		}
	?>
</table>
