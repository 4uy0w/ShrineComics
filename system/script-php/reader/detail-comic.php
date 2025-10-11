<?php
    $id_comic = $_GET["comic_id"];
    $id = $_GET["id"];

    $sql_syntax = "SELECT * FROM comic WHERE comic_id=$id_comic";
    $result = mysqli_query($server,$sql_syntax);

    $row = mysqli_fetch_array($result);
    
    $username = $row["comic_writer"];
    $sql_search_user = "SELECT * FROM user WHERE username='$username'";
    $result_user = mysqli_query($server,$sql_search_user);

    $row_user = mysqli_fetch_array($result_user);

?>

<section class="box-detail-comic">
    <section class="comic-description">
        <h2>title: <?php echo $row["comic_title"]; ?></h2>
        <h2>writer: <a href="?mode=detail-account&id=<?php echo $row_user['user_id'];?>&id=<?php echo $id; ?>"><?php echo $row["comic_writer"]; ?></a></h2>
        <h2>page: <?php echo $row["comic_page"]; ?></h2>
        <h2>price: <?php echo $row["comic_price"]; ?></h2>
        <h2>genre: <?php echo $row["comic_genre"]; ?></h2>
        <h2>release date: <?php echo $row["comic_release_date"]; ?></h2>
        <section class="comic-comment">
            <p><?php echo $row["comic_comment"]; ?></p>
        </section>
    </section>
    <section class="comic-image">
        <hr>
        <img src="<?php echo $row["comic_image"]; ?>">
    </section>
</section>