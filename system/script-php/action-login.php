<?php

    include "../koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql_syntax = "SELECT * FROM user WHERE username='$username' AND password='$password' AND email='$email'";

    $sql_exec = mysqli_query($server,$sql_syntax);

    if(mysqli_num_rows($sql_exec) > 0){
        echo "<script> window.alert('Berhasil login!'); </script>";
    }

?>
