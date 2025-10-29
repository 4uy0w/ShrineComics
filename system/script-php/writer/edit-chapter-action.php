<?php
    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];
    $chapter_id = $_GET["chapter_id"];

    include "../../koneksi.php";

    // validasi user,comic dan chapter 

    // prepare syntax
    $syntax_validate_users = "SELECT * FROM users WHERE user_id=$user_id";
    $syntax_validate_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
    $syntax_validate_chapter = "SELECT * FROM list_comic WHERE list_comic_id=$chapter_id";

    // check server 
    if(!$server){
        header("Location: error.php?action=disconnect_server");
    }

    // execute syntax 
    $exec_validate_users = mysqli_query($server,$syntax_validate_users);
    $exec_validate_comic = mysqli_query($server,$syntax_validate_comic);
    $exec_validate_chapter = mysqli_query($server,$syntax_validate_chapter);

    // check results 
    $found_users = false;
    $found_comic = false;
    $found_chapter = false;

    $users_data = null;
    $comic_data = null;
    $chapter_data = null;

    if($exec_validate_users){
        $found_users = true;
    }
    if($exec_validate_comic){
        $found_comic = true;
    }
    if($exec_validate_chapter){
        $found_chapter = true;
    }

    if(!$found_users && !$found_comic && !$found_chapter){
        header("Location: error.php?action=invalid_data");
    }

    if(!($_SERVER["REQUEST_METHOD"] == "POST")){
        header("Location: error.php?action=invalid_method");
    }

    // put data from edit form
    $update_chapter_name = $_POST["chapter_name"];
    $update_chapter_image = $_FILES["chapter_image"];

    // generate random number 
    $random_number = rand(0,999999);

    // uploading new image
    $update_uploaded_image = basename($update_chapter_image["name"]);
    $directory_dest = "../../../image/comic";

    $full_path_image = "$directory_dest/$update_uploaded_image-$random_number";

    if(!move_uploaded_file($update_chapter_image["tmp_name"],$full_path_image)){
        header("Location: error.php?action=cannot_upload_file");
    }

    // update data
    $syntax_update_chapter = "UPDATE list_comic SET list_comic_name='$update_chapter_name',list_comic_image='$full_path_image' WHERE list_comic_id=$chapter_id";
    $result_update_chapter = mysqli_query($server,$syntax_update_chapter);

    if(!$result_update_chapter){
        header("Location: error.php?action=cannot_update_chapter");
    }else{
        header("Location: show.php?user_id=$user_id&comic_id=$comic_id");
    }
?>