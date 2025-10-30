<?php

    $user_id = $_GET["user_id"];

    $upload_comic_banner = false;
    $upload_comic = false;

    $user_data = null;

    include "../../koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $syntax_search_user = "SELECT * FROM users WHERE user_id=$user_id";
        $result_search_user = mysqli_query($server,$syntax_search_user);

        if($result_search_user){
            $user_data = mysqli_fetch_array($result_search_user);
        }

        $comic_title = $_POST["comic_title"];
        $comic_comment = $_POST["comic_comment"];
        $comic_banner = $_FILES["comic_banner"];
        $comic_genre = $_POST["comic_genre"];
        $comic_writer = $user_data["username"];

        $banner_directory = "../../../image/banner";
        $banner_name = basename($comic_banner["name"]);
        $banner_string_name = "$banner_directory/$banner_name";

        if(move_uploaded_file($comic_banner["tmp_name"],$banner_string_name)){
            $upload_comic_banner = true;
        }

        if($upload_comic_banner){
            $sql_syntax = "INSERT INTO comic (comic_title,comic_writer,comic_banner,comic_comment,comic_chapter,comic_genre) VALUES ('$comic_title','$comic_writer','$banner_string_name','$comic_comment',0,'$comic_genre')";
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