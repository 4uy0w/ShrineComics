<?php
    $id_comic = $_GET["comic_id"];
    $id = $_GET["id"];

    $sql_syntax = "SELECT * FROM comic WHERE comic_id=$id_comic";
    $result = mysqli_query($server,$sql_syntax);

    $row = mysqli_fetch_array($result);
    
    $username = $row["comic_writer"];
    $sql_search_user = "SELECT * FROM users WHERE username='$username'";
    $result_user = mysqli_query($server,$sql_search_user);

    $row_user = mysqli_fetch_array($result_user);

?>

<div class="comic-detail-box">
    <div class="comic-first-container">
        <section class="banner-area">
            <img src="<?php echo $row['comic_banner']; ?>" id="image-banner-detail">
        </section>
        <section class="comic-description-container">
            <p><b>title</b><b>: </b><?php echo $row["comic_title"]; ?></p>
            <p><b>page</b><b>: </b><?php echo $row["comic_page"]; ?></p>
            <p><b>price</b><b>: </b><?php echo $row["comic_price"]; ?></p>
            <p><b>writer</b><b>: </b><?php echo $row["comic_writer"]; ?></p>
            <p><b>genre</b><b>: </b><?php echo $row["comic_genre"]; ?></p>
            <p><b>release date</b><b>: </b><?php echo $row["comic_release_date"]; ?></p>
        </section>
    </div>
    <div class="comic-comment-container">
        <section class="comic-comment-box">
            <?php echo $row["comic_comment"]; ?>
        </section>
    </div>
    <div class="comic-image-container">
       <section class="comic-image-section">
            <img src="<?php echo $row['comic_image']; ?>" id="image-comic-result">
       </section>
    </div>
    <div class="show-details-action-container">
        <section class="comic-action-box">
            <a href="?mode=normal-dashboard&id=<?php echo $id; ?>"><button id="button-back">Back</button></a>
            <a href="buy-comic.php?id_comic=<?php echo $id_comic; ?>&id_user=<?php echo $id; ?>"><button id="button-buy-add">Buy and Add to library</button></a>
        </section>
    </div>
</div>