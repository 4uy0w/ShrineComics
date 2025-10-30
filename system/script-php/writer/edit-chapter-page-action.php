<?php 
    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];
    $chapter_id = $_GET["chapter_id"];
    $chapter_page = $_GET["chapter_page"];

    include "../../koneksi.php";

    $syntax_search_user = "SELECT * FROM users WHERE user_id=$user_id";
    $syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
    $syntax_search_chapter = "SELECT * FROM chapter WHERE chapter_id=$chapter_id";

    $exec_search_user = mysqli_query($server,$syntax_search_user);
    $exec_search_comic = mysqli_query($server,$syntax_search_comic);
    $exec_search_chapter = mysqli_query($server,$syntax_search_chapter);

    $user_data = null;
    $comic_data = null;
    $chapter_data = null;

    if($exec_search_user){
        $user_data = mysqli_fetch_array($exec_search_user);
    }
    if($exec_search_comic){
        $comic_data = mysqli_fetch_array($exec_search_comic);
    }
    if($exec_search_chapter){
        $chapter_data = mysqli_fetch_array($exec_search_chapter);
    }

    $chapter_from = $chapter_data["chapter_name"];

    $uploaded_files = $_FILES["chapter_page_image"];
    $tmp_name = $uploaded_files["tmp_name"];
    $image_basename = basename($uploaded_files["name"]);
    $dirname = "../../../image/comic";
    $uploaded_name = "$dirname/$image_basename";

    if(move_uploaded_file($tmp_name,$uploaded_name)){
        $syntax_update_image = "UPDATE chapter_page SET chapter_page_image='$uploaded_name' WHERE chapter_page_number=$chapter_page";
        $exec_update_image = mysqli_query($server,$syntax_update_image);

        if($exec_update_image){
            header("Location: confirm-chapter.php?user_id=$user_id&comic_id=$comic_id&chapter_id=$chapter_id");
        }
    }
?>