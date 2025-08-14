<?php

    $hostname = "localhost";
    $username = "hikari";
    $password = "123";
    $database = "ShrineComics";

    $server = mysqli_connect($hostname,$username,$password,$database);

    if(!$server){
        echo "cannot connect to database: " . mysqli_error($server);
    }

?>