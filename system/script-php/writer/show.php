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
        $syntax_search_chapter = "SELECT * FROM list_comic WHERE list_comic_identifier='$comic_title' ORDER BY list_comic_chapter ASC";
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
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="comic-show-area">
            <div class="comic-show-box">
                <div class="comic-show-main-box">
                    <div class="comic-show-metadata">
                        <div class="comic-show-banner">
                            <img src="<?php echo $comic_data['comic_banner']; ?>" id="comic-show-banner">
                        </div>
                        <div class="comic-show-data">
                            <!-- Comic Data Here -->
                            <p id="comic-data-text"><b>Title</b><b>: </b><?php echo $comic_data["comic_title"]; ?></p>
                            <p id="comic-data-text"><b>Writer</b><b>: </b><?php echo $comic_data["comic_writer"]; ?></p>
                            <p id="comic-data-text"><b>Chapter</b><b>: </b><?php echo $comic_data["comic_chapter"]; ?></p>
                            <p id="comic-data-text"><b>Price</b><b>: </b><?php echo $comic_data["comic_price"]; ?></p>
                            <p id="comic-data-text"><b>Genre</b><b>: </b><?php echo $comic_data["comic_genre"]; ?></p>
                        </div>
                    </div>
                    <div class="comic-show-description">
                        <div class="comic-show-description-box">
                            <!-- Comic Description Here -->
                            <h4>From <?php echo $comic_data["comic_writer"]?>:</h4>
                            <section class="line-separator"></section>
                            <div class="writer-description">
                                <p><?php echo $comic_data["comic_comment"]; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="comic-show-chapter" id="chapter-list">
                        <div class="comic-show-chapter-box">
                            <!-- Comic Chapter Here -->
                             <?php 
                                if(!$found_chapter){
                                    ?>
                                    <section class="chapter-not-found-notification">
                                        <h3>Chapter Not Found... Create One?</h3>
                                    </section>
                                    <?php 
                                }else{
                                    ?>
                                    <table class="table-chapter-comic">
                                        <tr>
                                            <th>Chapter</th>
                                            <th>Writer</th>
                                            <th>Release Date</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php 
                                            while(($row_chapter = mysqli_fetch_array($chapter_data))){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="read-chapter.php?user_id=<?php echo $user_id; ?>&comic_id=<?php echo $comic_data['comic_id'];?>&chapter_id=<?php echo $row_chapter['list_comic_id'];?>">Chapter <?php echo $row_chapter["list_comic_chapter"]; ?>: <?php echo $row_chapter["list_comic_name"]; ?></a>
                                                    </td>
                                                    <td>
                                                        <?php echo $row_chapter["list_comic_writer"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row_chapter["list_comic_release_date"]; ?>
                                                    </td>
                                                    <td>
                                                        <a href="edit-chapter.php?user_id=<?php echo $user_data['user_id']; ?>&comic_id=<?php echo $comic_data['comic_id']; ?>&chapter_id=<?php echo $row_chapter['list_comic_id']; ?>"><button type="button" id="button-edit-action">Edit</button></a>
                                                        <a href="delete-chapter.php?user_id=<?php echo $user_data['user_id']; ?>&comic_id=<?php echo $comic_data['comic_id']; ?>&chapter_id=<?php echo $row_chapter['list_comic_id']; ?>"><button type="button" id="button-delete-action">Delete</button></a>
                                                    </td>
                                                </tr>
                                                <?php 
                                            }
                                        ?>
                                    </table>
                                    <?php
                                }
                             ?>
                        </div>
                        <div class="create-chapter-action-box">
                            <div class="create-chapter-action">
                                <a href="create-chapter.php?user_id=<?php echo $user_data['user_id']; ?>&comic_id=<?php echo $comic_data['comic_id']; ?>"><button type="button" id="create-new-chapter-button">Create new chapter!</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="comic-show-comment">
                        <!-- Comic Comment Here -->
                        <div class="comic-show-comment-box">
                            <div class="comment-box-main">
                                <?php
                                    if($found_comment){
                                        while(($row_comment = mysqli_fetch_array($comment_data))){
                                            ?>
                                            <div class="comment-box-user">
                                              <div class="comment-box-user-data">
                                                    <p><b>From: </b><i><?php echo $row_comment["comment_sender_name"]; ?></i></p>
                                                    <section class="line-separator-comment"></section>
                                                    <div class="comment-box-user-text">
                                                        <p><?php echo $row_comment["comment_sender_text"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                        }
                                    }else{
                                        ?>
                                        <div class="comment-not-found-notifications">
                                            <h2 id="comment-not-found-text">Comment not found</h2>
                                        </div>
                                        <?php 
                                    }
                                ?>
                            </div>
                            <div class="back-button-area">
                                <a href="index.php?id=<?php echo $user_id?>"><button id="button-back-home">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>