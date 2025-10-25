<?php 
    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];

    $user_data = null;
    $comic_data = null;

    $found_comic = false;
    $found_user = false;

    $success_to_upload = false;
    $success_to_insert = false;

    include "../../koneksi.php";
    
    if($server){
        $syntax_search_user = "SELECT * FROM users WHERE user_id=$user_id";
        $result_search_user = mysqli_query($server,$syntax_search_user);

        if($result_search_user){
            $found_user = true;
            $user_data = mysqli_fetch_array($result_search_user);
        }

        $syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
        $result_search_comic = mysqli_query($server,$syntax_search_comic);

        if($result_search_comic){
            $found_comic = true;
            $comic_data = mysqli_fetch_array($result_search_comic);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $chapter_name = $_POST["chapter_name"];
            $chapter_image = $_FILES["chapter_comic"];

            $ChapterDirectory = "../../../image/comic";
            $ChapterImageBasename = basename($chapter_image["name"]);
            $ChapterUploadName = "$ChapterDirectory/$ChapterImageBasename";

            if(move_uploaded_file($chapter_image["tmp_name"],$ChapterUploadName)){
                $success_to_upload = true;
            }

            $chapter_writer = $user_data["username"];
            $chapter_identifier = $comic_data["comic_title"];
            $chapter_number = $comic_data["comic_chapter"] + 1;

            $syntax_insert_chapter = "INSERT INTO list_comic (list_comic_chapter,list_comic_name,list_comic_identifier,list_comic_writer,list_comic_image,list_comic_release_date) VALUES ($chapter_number,'$chapter_name','$chapter_identifier','$chapter_writer','$ChapterUploadName',NOW())";
            $result_insert_chapter = mysqli_query($server,$syntax_insert_chapter);

            $syntax_update_chapter = "UPDATE comic SET comic_chapter=$chapter_number WHERE comic_title='$chapter_identifier'";
            $result_update_chapter = mysqli_query($server,$syntax_update_chapter);

            if($result_insert_chapter && $result_update_chapter){
                $success_to_insert = true;
                header("Location: show.php?user_id=$user_id&comic_id=$comic_id");
            }
        }
    }
?>