<?php

    include "../../koneksi.php";

    $id_comic = $_GET["id_comic"];
    $id_user = $_GET["id_user"];

    $search_user = null;
    $search_comic = null;
    $search_library = null;
    $search_writer = null;

    $username = null;
    $user_id = null;
    $comic_id = null;
    $comic_title = null;
    $comic_price = null;
    $comic_writer = null;

    $syntax_search_user = "SELECT * FROM users WHERE user_id=$id_user";
    $result_search_user = mysqli_query($server,$syntax_search_user);
    if(mysqli_num_rows($result_search_user) <= 0){
        $search_user = mysqli_fetch_array($result_search_user);
        $username = $search_user["username"];
    }

    $syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$id_comic";
    $result_search_comic = mysqli_query($server,$syntax_search_comic);
    if(mysqli_num_rows($result_search_comic) <= 0){
        $search_comic = mysqli_fetch_array($result_search_comic);
        $comic_title = $row_search_comic["comic_title"];
        $comic_id = $row_search_comic["comic_id"];
        $comic_price = $row_search_comic["comic_price"];
        $comic_writer = $row_search_comic["comic_writer"];
    }

    $syntax_search_library = "SELECT * FROM library WHERE library_owner='$username'";
    $result_search_library = mysqli_query($server,$syntax_search_library);
    if(mysqli_num_rows($result_search_library) == 0){
        $search_library = mysqli_fetch_array($result_search_library);
    }

    $syntax_search_writer = "SELECT * FROM users WHERE username='$comic_writer'";
    $result_search_writer = mysqli_query($server,$syntax_search_writer);
    if(mysqli_num_rows($result_search_writer) == 0){
        $search_writer = mysqli_fetch_array($result_search_writer);
    }

    if($search_user != null && $search_comic != null){
        $point = $search_user["point"] - $search_comic["comic_price"];
        $update_user_point = "UPDATE users SET point=$point WHERE username='$username'";
        $result_update_point = mysqli_query($server,$update_user_point);
        if($result_update_point){
            // if success to update users point
        }

        $point = $search_writer["point"] + $search_comic["comic_price"];
        $update_writer_point = "UPDATE users SET point=$point WHERE username='$username'";
        $result_update_point = mysqli_query($server,$update_writer_point);
        if($result_update_point){
            // if success to update users point
        }

        $add_buy_log = "INSERT INTO rent_comic (rent_user_id,rent_comic_id,rent_username,rent_comic_name,rent_comic_price) VALUES ($user_id,$comic_id,$username,$comic_title,$comic_price)";
        $update_comic_buy = mysqli_query($server,$add_buy_log);
        if($update_comic_buy){
            // if success to update buy log
        }

        $count_comic = $search_library["library_comic"] + 1;
        $update_library_comic = "UPDATE library SET library_comic=$count_comic";
        $exec_update_library = mysqli_query($server,$update_library_comic);
        if($exec_update_library){
            // if success to update comic count
        }
    }
?>