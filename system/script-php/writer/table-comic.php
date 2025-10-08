<?php

	include "../../koneksi.php";

	$success = false;

	if($server){
		echo "<script> window.alert('berhasil terhubung dengan database'); </script>";
	}

	$sql_query = "SELECT comic_id,comic_title,comic_writer,comic_genre FROM comic";
	$result = mysqli_query($server,$sql_query);

	if($result){
		$success = true;
	}

?>

<table border="1px solid black" class="table-comic" style="border-collapse: collapse;">
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
					<a href="delete.php?id_comic=<?php echo $row["comic_id"]; ?>&id_writer=<?php echo $id_admin;?>"><button id="delete-comic-btn">Delete</button></a>
					<a href="edit.php?id_comic=<?php echo $row["comic_id"]; ?>&id_writer=<?php echo $id_admin; ?>"><button id="edit-comic-btn">Edit</button></a>
					<a href="#see"><button id="see-comic-btn">See</button></a>
				</td>
			</tr>
			<?php
		}
	?>
</table>
