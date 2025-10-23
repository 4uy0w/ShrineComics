<?php

    $user_id = $_GET["user_id"];

    include "../../koneksi.php";

    $chapter_name = $_POST["chapter-title"];
    $chapter_owner = $_POST["chapter-writer"];
    $chapter_comment = $_POST["chapter-comment"];

    $search_user = "SELECT * FROM users WHERE user_id=$user_id";
    $result_search_user = mysqli_query($server,$search_user);

    if(mysqli_num_rows($result_search_user) == 0){
        echo "
        <script> 
        window.alert('User tidak di temukan'); 
        </script>";
    }

    $sql_syntax = "INSERT INTO bundle_comic (bundle_comic_name,bundle_comic_owner,bundle_comic_comment,bundle_comic_chapter) VALUES('$chapter_name','$chapter_owner','$chapter_comment',0)";
    $result = mysqli_query($server,$sql_syntax);

    if($result){
        echo "<script> window.alert('Berhasil membuat chapter cluster'); </script>";
    }else{
        echo "<script> window.alert('Gagal membuat chapter cluster'); </script>";
    }

?>