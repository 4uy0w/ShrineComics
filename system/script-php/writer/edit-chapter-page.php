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

    $syntax_search_chpage = "SELECT * FROM chapter_page WHERE chapter_page_chapter='$chapter_from' AND chapter_page_number=$chapter_page";
    $result_search_chpage = mysqli_query($server,$syntax_search_chpage);

    $chpage_data = mysqli_fetch_array($result_search_chpage);
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Edit Page <?php echo $chapter_page; ?> from chapter <?php echo $chapter_data["chapter_name"]; ?></title>
        <link rel="stylesheet" type="text/css" href="style-edit-chapter.css">
    </head>
    <body>
        <div class="area-box">
            <div class="main-box">
                <div class="content-box-outer">
                    <div class="content-box-inner">
                        <img src="<?php echo $chpage_data["chapter_page_image"]; ?>" id="image-page-chapter">
                    </div>
                    <div class="action-box">
                        <a href="delete-chapter-page.php?user_id=<?php echo $user_id ?>&$comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $chapter_id; ?>&chapter_page=<?php echo $chapter_page; ?>"><button type="button" id="delete-btn">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>