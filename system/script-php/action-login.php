<?php

    include "../koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql_syntax = "SELECT * FROM user WHERE username='$username' AND password='$password' AND email='$email'";

    $sql_exec = mysqli_query($server,$sql_syntax);

    if(mysqli_num_rows($sql_exec) > 0){
        echo "<script> window.alert('Berhasil login!'); </script>";

        $go_login_sql = "UPDATE user SET status='LOGIN' WHERE username='$username'";
        $result = mysqli_query($server,$go_login_sql);

        $row = mysqli_fetch_array($sql_exec);

        $get_role = $row["role"];
        $get_id = $row["user_id"];

        if($get_role == "writer"){
            header("Location: http://127.0.0.1:8000/writer/index.php?id=$get_id");
        }else if($get_role == "reader"){
            //header("Location: http://127.0.0.1:8000/reader/");
        }
    }

?>
