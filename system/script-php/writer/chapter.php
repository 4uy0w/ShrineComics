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
            $chapter_price = $_POST["chapter_price"];
            $chapter_image = $_FILES["chapter_image"];

            $ChapterDirectory = "../../../image/comic/";

            $count_page = count($chapter_image["name"]);

            $chapter_writer = $user_data["username"];
            $chapter_identifier = $comic_data["comic_title"];
            $chapter_number = $comic_data["comic_chapter"] + 1;

            $syntax_insert_chapter = "INSERT INTO chapter (chapter_name,chapter_writer,chapter_comic,chapter_price,chapter_release_date,chapter_number) VALUES ('$chapter_name','$chapter_writer','$chapter_identifier',$chapter_price,CURDATE(),$chapter_number)";
            $result_insert_chapter = mysqli_query($server,$syntax_insert_chapter);

            $syntax_update_chapter = "UPDATE comic SET comic_chapter=$chapter_number WHERE comic_title='$chapter_identifier'";
            $result_update_chapter = mysqli_query($server,$syntax_update_chapter);

            for($index_image = 0; $count_page > $index_image; $index_image++){
                if(move_uploaded_file($chapter_image["tmp_name"][$index_image],$ChapterDirectory .basename($chapter_image["name"][$index_image]))){
                    $chapter_image_name = $ChapterDirectory . $chapter_image["name"][$index_image];

                    $page_number = $index_image + 1;
                
                    $syntax_add_image = "INSERT INTO chapter_page (chapter_page_number,chapter_page_image,chapter_page_chapter,chapter_page_writer) VALUES ($page_number,'$chapter_image_name','$chapter_name','$chapter_writer')";
                    $result_add_image = mysqli_query($server,$syntax_add_image);

                    if($result_add_image){
                        // if success
                    }
                }
            }

            $syntax_update_chapter_page = "UPDATE chapter SET chapter_page=$count_page WHERE chapter_name='$chapter_name'";
            $exec_update_chapter_page = mysqli_query($server,$syntax_update_chapter_page);

            $search_chapter = "SELECT * FROM chapter WHERE chapter_name='$chapter_name'";
            $result_search = mysqli_query($server,$search_chapter);

            $row_chapter = mysqli_fetch_array($result_search);

            $chapter_id = $row_chapter["chapter_id"];

            if($result_insert_chapter && $result_update_chapter && $exec_update_chapter_page){
                $success_to_insert = true;
                header("Location: confirm-chapter.php?user_id=$user_id&comic_id=$comic_id&chapter_id=$chapter_id");
            }
        }
    }
?>