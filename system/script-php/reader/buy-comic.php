<?php

    include "../../koneksi.php";

    $id_comic = $_GET["id_comic"];
    $id_user = $_GET["id_user"];

    $search_user = null;
    $search_comic = null;

    $earch_library = null;

    $username = null;
    $comic_title = null;

    $syntax_search_user = "SELECT * FROM users WHERE user_id=$id_user";
    $result_search_user = mysqli_query($server,$syntax_search_user);
    if(mysqli_num_rows($result_search_user) <= 0){
        $search_user = mysqli_fetch_array($result_search_user);
        $username = $row_search_user["username"];
    }

    $syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$id_comic";
    $result_search_comic = mysqli_query($server,$syntax_search_comic);
    if(mysqli_num_rows($result_search_comic) <= 0){
        $search_comic = mysqli_fetch_array($result_search_comic);
        $comic_title = $row_search_comic["comic_title"];
    }

    $syntax_search_library = "SELECT * FROM library WHERE library_owner=$username";
    $result_search_library = mysqli_query($server,$syntax_search_library);
    if(mysqli_num_rows($result_search_library) >= 0){
        $search_library = $result_search_library;
    }

    if($search_user != null && $search_comic != null){
        $point = $search_user["point"] - $search_comic["price"];
        $update_user_point = "UPDATE users SET point=$point WHERE username=$username";
        $result_update_point = mysqli_query($server,$update_user_point);
        if($result_update_point){
            // if success to update users point
        }
    }
?>