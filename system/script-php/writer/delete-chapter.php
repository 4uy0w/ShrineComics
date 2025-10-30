<?php
    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];
    $chapter_id = $_GET["chapter_id"];

    include "../../koneksi.php";

    $comic_data = null;

    if($server){
        $syntax_delete_chapter = "DELETE FROM chapter WHERE chapter_id=$chapter_id";
        $result_delete_chapter = mysqli_query($server,$syntax_delete_chapter);

        $syntax_get_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
        $result_get_comic = mysqli_query($server,$syntax_get_comic);

        if($result_get_comic){
            $comic_data = mysqli_fetch_array($result_get_comic);
        }

        $comic_chapter = $comic_data["comic_chapter"] - 1;

        $syntax_update_chapter = "UPDATE comic SET comic_chapter=$comic_chapter WHERE comic_id=$comic_id";
        $result_update_chapter = mysqli_query($server,$syntax_update_chapter);

        if($result_delete_chapter && $result_update_chapter){
            header("Location: show.php?user_id=$user_id&comic_id=$comic_id#chapter-list");
        }
    }
?>