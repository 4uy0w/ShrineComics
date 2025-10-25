<?php

    $user_id = $_GET["user_id"];

    $upload_comic_banner = false;
    $upload_comic = false;

    include "../../koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $comic_title = $_POST["comic_title"];
        $comic_writer = $_POST["comic_writer"];
        $comic_price = $_POST["comic_price"];
        $comic_comment = $_POST["comic_comment"];
        $comic_banner = $_FILES["comic_banner"];

        $banner_directory = "../../../image/banner";
        $banner_name = basename($comic_banner["name"]);
        $banner_string_name = "$banner_directory/$banner_name";

        if(move_uploaded_file($comic_banner["tmp_name"],$banner_string_name)){
            $upload_comic_banner = true;
        }

        if($upload_comic_banner){
            $sql_syntax = "INSERT INTO comic (comic_title,comic_writer,comic_price,comic_banner,comic_comment,comic_chapter) VALUES ('$comic_title','$comic_writer',$comic_price,'$banner_string_name','$comic_comment',0)";
            $insert_comic = mysqli_query($server,$sql_syntax);

            if($insert_comic){
                $upload_comic = true;
            }
        }

        if($upload_comic_banner && $upload_comic){
            header("Location: index.php?id=$user_id");
        }
    }else{
        echo "ONLY POST-TYPE METHOD!";
    }

?>