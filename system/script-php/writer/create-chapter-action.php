<?php

    $user_id = $_GET["user_id"];

    include "../../koneksi.php";

    $table = "bundle_comic";

    $chapter_name = $_POST["chapter-title"];
    $chapter_owner = $_POST["chapter-owner"];

    $sql_syntax = "INSERT INTO $table (bundle_comic_name,bundle_comic_owner,bundle_comic_comment,bundle_comic_chapter) VALUES('$chapter_name','$chapter_owner','$chapter_comment')";
    $result = mysqli_query($server,$sql_syntax);

    if($result){
        echo "<script> window.alert('Berhasil membuat chapter cluster'); </script>";
    }else{
        echo "<script> window.alert('Gagal membuat chapter cluster'); </script>";
    }

?>