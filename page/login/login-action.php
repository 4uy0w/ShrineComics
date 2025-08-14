<?php

    include "../../system/connection/ConnectServer.php";

    $USERNAME = $_GET['username'];
    $PASSWORD = $_GET['password'];

    echo "PASSWORD: $PASSWORD | USERNAME: $USERNAME <br>";

    $search_syntax = "SELECT * FROM user WHERE username='$USERNAME' AND password='$PASSWORD'";
    $exec_syntax = mysqli_query($server,$search_syntax);
    if(mysqli_num_rows($exec_syntax) > 0){
        echo "<script>window.alert('valid username!')</script>";
    }else{
        header("Location: http://localhost/ShrineComics/page/login/index.php?status=invalid_user");
    }

?>