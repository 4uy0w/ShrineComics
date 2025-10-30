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

    $chapter_name = $chapter_data["chapter_name"];

    $syntax_delete_chapter_page = "DELETE FROM chapter_page WHERE chapter_page_chapter='$chapter_name' AND chapter_page_number=$chapter_page";
    $exec_delete_chapter_page = mysqli_query($server,$syntax_delete_chapter_page);

    if($exec_delete_chapter_page){
        header("Location: confirm-chapter.php?user_id=$user_id&comic_id=$comic_id&chapter_id=$chapter_id");
    }


?>