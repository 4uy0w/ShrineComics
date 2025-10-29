<?php 
    $comic_id = $_GET["comic_id"];
    $chapter_id = $_GET["chapter_id"];
    $user_id = $_GET["user_id"];

    $comic_data = null;
    $chapter_data = null;

    $found_comic = false;
    $found_chapter = false;

    include "../../koneksi.php";

    if($server){
        $syntax_search_comic = "SELECT * FROM comic WHERE comic_id=$comic_id";
        $result_search_comic = mysqli_query($server,$syntax_search_comic);

        if(mysqli_num_rows($result_search_comic) > 0){
            $found_comic = true;
            $comic_data = mysqli_fetch_array($result_search_comic);
        }

        $comic_name = $comic_data["comic_title"];
        $syntax_search_chapter = "SELECT * FROM list_comic WHERE list_comic_id=$chapter_id AND list_comic_identifier='$comic_name'";
        $result_search_chapter = mysqli_query($server,$syntax_search_chapter);

        if(mysqli_num_rows($result_search_chapter) > 0){
            $found_chapter = true;
            $chapter_data = mysqli_fetch_array($result_search_chapter);
        }
    }else{
        echo "failed to connect into server!";
    }
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Read Chapter: <?php echo $chapter_data["list_comic_name"]; ?> from <?php echo $comic_data["comic_title"]; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="read-chapter-area">
            <div class="read-chapter-box">
                <div class="read-chapter-main-box">
                    <section class="comic-title-section">
                        <h2><?php echo $chapter_data["list_comic_name"]?></h2>
                    </section>
                    <div class="read-chapter-image-area">
                        <img src="<?php echo $chapter_data['list_comic_image']?>" id="image-chapter">
                    </div>
                    <div class="read-chapter-action">
                        <a href="show.php?comic_id=<?php echo $comic_id; ?>&user_id=<?php echo $user_id; ?>"><button id="back-chapter-button">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
        <script src="script-read-chapter.js"></script>
    </body>
</html>