<?php

    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];
    $chapter_id = $_GET["chapter_id"];
    
    include "../../koneksi.php";

    $found_user = false;
    $found_comic = false;
    $found_chapter = false;

    $user_data = null;
    $comic_data = null;
    $chapter_data = null;

    $comic_title = "";

    if($server){
        // cek user
        $syntax_search_user = "SELECT * FROM users WHERE user_id=$user_id";
        $result_search_user = mysqli_query($server,$syntax_search_user);

        if(mysqli_num_rows($result_search_user) > 0){
            $found_user = true;
        }

        // cek komik
        $syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
        $result_search_comic = mysqli_query($server,$syntax_search_comic);

        if(mysqli_num_rows($result_search_comic) > 0){
            $found_comic = true;
        }

        // cek chapter
        $syntax_search_chapter = "SELECT * FROM list_comic WHERE list_comic_id=$chapter_id";
        $result_search_chapter = mysqli_query($server,$syntax_search_chapter);

        if(mysqli_num_rows($result_search_chapter) > 0){
            $found_chapter = true;
        }

        if($found_user){
            $user_data = mysqli_fetch_array($result_search_user);
        }

        if($found_comic){
            $comic_data = mysqli_fetch_array($result_search_comic);
        }

         if($found_chapter){
            $chapter_data = mysqli_fetch_array($result_search_chapter);
        }
    }

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Create New Chapter For Comic: <?php echo $comic_data["comic_title"]; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="create-chapter-area">
            <div class="create-chapter-main-box">
                <div class="create-chapter-form">
                    <form action="edit-chapter-action.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $chapter_id; ?>" method="post" enctype="multipart/form-data">
                       <section class="input-area">
                            <p id="text-input">Chapter Name</p> 
                            <input type="text" name="chapter_name" id="chapter-name" value="<?php echo $chapter_data['list_comic_name']; ?>">
                       </section>
                       <section class="input-area">
                            <p id="text-input">Chapter Comic</p> 
                            <input type="file" name="chapter_image" id="chapter-comic-upload-invisible">
                            <button type="button" id="chapter-image-button">Upload Image</button>
                       </section>
                       <section class="preview-comic-chapter">
                            <img src="<?php echo $chapter_data['list_comic_image']; ?>" id="preview-image">
                       </section>
                       <section class="input-area-action">
                            <button type="submit" id="button-submit">Edit Chapter!</button>
                            <button type="reset" id="button-reset">Reset</button>
                            <a href="show.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>"><button type="button" id="button-back">Back</button></a>
                       </section>
                    </form>
                </div>
            </div>
        </div>
        <script src="script-chapter.js"></script>
    </body>
</html>