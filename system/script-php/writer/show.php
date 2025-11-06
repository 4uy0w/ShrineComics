<?php

    $user_id = $_GET["user_id"];
    $comic_id = $_GET["comic_id"];
    
    include "../../koneksi.php";

    $found_user = false;
    $found_comic = false;
    $found_chapter = false;
    $found_comment = false;

    $user_data = null;
    $comic_data = null;
    $chapter_data = null;
    $comment_data = null;

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

        if($found_user){
            $user_data = mysqli_fetch_array($result_search_user);
        }

        if($found_comic){
            $comic_data = mysqli_fetch_array($result_search_comic);
        }

        // cek chapter
        $comic_title = $comic_data["comic_title"];
        $syntax_search_chapter = "SELECT * FROM chapter WHERE chapter_comic='$comic_title' ORDER BY chapter_number ASC";
        $result_search_chapter = mysqli_query($server,$syntax_search_chapter);

        if(mysqli_num_rows($result_search_chapter) > 0){
            $chapter_data = $result_search_chapter;
            $found_chapter = true;
        }

        // ambil komentar 
        $syntax_search_comment = "SELECT * FROM comment WHERE comment_comic_dest='$comic_title'";
        $result_search_comment = mysqli_query($server,$syntax_search_comment);

        if(mysqli_num_rows($result_search_comment) > 0){
            $found_comment = true;
            $comment_data = $result_search_comment;
        }

    }

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Show Comic: <?php echo $comic_data["comic_title"]; ?></title>
        <link rel="stylesheet" type="text/css" href="style-show-page.css">
    </head>
    <body>
        <div class="show-area">
            <div class="show-main-box">
                <div class="banner-area">
                    <section class="section-text-desc">
                        <p id="text-desc"><b>title: </b><?php echo $comic_data["comic_title"]; ?></p>
                        <p id="text-desc"><b>writer: </b><?php echo $comic_data["comic_writer"]; ?></p>
                        <p id="text-desc"><b>chapter: </b><?php echo $comic_data["comic_chapter"]; ?></p>
                        <p id="text-desc"><b>genre: </b><?php echo $comic_data["comic_genre"]; ?></p>
                    </section>
                </div>
                <div class="short-desc-area">
                    <img src="<?php echo $comic_data["comic_banner"]; ?>" id="comic-banner">
                </div>
            </div>
            <div class="long-desc-area">
                <div class="long-desc-box">
                    <div class="desc-area">
                        <h1 id="comment-writer">
                            From <?php echo $comic_data["comic_writer"]; ?>
                        </h1>
                        <div class="comment-text">
                            <section class="comment-context">
                                <p><?php echo $comic_data["comic_comment"]; ?></p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chapter-show-area">
                <div class="chapter-box-area">
                    <div class="section-text-chapter">
                        <h1 id="comment-writer">
                            Chapter:
                        </h1>
                    </div>
                    <table border="1px solid black" id="table-chapter">
                        <tr>
                            <th>chapter</th>
                            <th>release date</th>
                            <th>action</th>
                        </tr>
                        <?php while(($row = mysqli_fetch_array($chapter_data))){
                            ?>
                            <tr>
                                <td><?php echo $row["chapter_name"]?></td>
                                <td><?php echo $row["chapter_release_date"]?></td>
                                <td>
                                    <a href="edit-chapter.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $row["chapter_id"]; ?>"><button id="edit-btn">Edit</button></a>
                                    <a href="delete-chapter.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_id; ?>&chapter_id=<?php echo $row["chapter_id"]; ?>"><button id="delete-btn">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div class="section-upload-chapter">

                    </div>
                </div>
            </div>
            <div class="comment-show-area">
                <div class="comment-show-box"></div>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>