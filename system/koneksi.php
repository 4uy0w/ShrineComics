<?php

	$HOSTNAME = "localhost";
	$USERNAME = "Hikari";
	$PASSWORD = "123";
	$DATABASE = "ShrineComics";

	$SUCCESS_CONNECT = false;

	$server = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

	if($server){
		$SUCCESS_CONNECT = true;
	}

?>
