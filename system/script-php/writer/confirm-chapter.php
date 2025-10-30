<?php 
    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];
    $chapter_id = $_GET["chapter_id"];

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

    $syntax_search_chpage = "SELECT * FROM chapter_page WHERE chapter_page_chapter='$chapter_from'";
    $result_search_chpage = mysqli_query($server,$syntax_search_chpage);
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>confirm chapter <?php echo $chapter_data["chapter_name"]; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="chapter-confirm-area">
            <center>
                <h2>Confirm upload chapter <?php echo $chapter_data["chapter_name"]; ?></h2>
            </center>
            <div class="chapter-confirm-box">
                <div class="chapter-confirm-main-box">
                    <div class="page-view-area">
                        <?php 
                            while(($row = mysqli_fetch_array($result_search_chpage))){
                                ?>
                                <div class="chapter-page-box">
                                    <section class="chapter-page-preview">
                                        <img src="<?php echo $row['chapter_page_image']; ?>" id="chapter-image-preview">
                                    </section>
                                    <section class="chapter-page-box-data">
                                        <p id="chapter-page-text-count">Page : <?php echo $row["chapter_page_number"]; ?></p>
                                        <section class="chapter-page-action-box">
                                            <a href="delete-chapter-page.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $chapter_id; ?>&chapter_page=<?php echo $row['chapter_page_number']; ?>"><button id="delete-chapter-page-button"><b>Delete</b></button></a>
                                        </section>
                                    </section>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="chapter-confirm-action-box">
                        <section class="action-box-button-confirm">
                            <a href="accept-confirm-chapter.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $chapter_id; ?>"><button id="chapter-confirm-btn"><b>Confirm and Upload</b></button></a>
                            <a href="pending-chapter.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $chapter_id; ?>"><button id="chapter-pending-btn"><b>Pending</b></button></a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>