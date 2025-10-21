<?php

    $id = $_GET["id"];

    $sql_syntax = "SELECT * FROM comic";
    $result = mysqli_query($server,$sql_syntax);

?>
<section class="comic-list">
    <?php 
        while(($row = mysqli_fetch_array($result))){
            ?>
            <section class="comic-card">
                <section class="comic-banner">
                    <img src="<?php echo $row['comic_banner']; ?>" id="image-banner">
                </section>
                <section class="comic-description">
                    <p><?php echo $row["comic_comment"]; ?></p>
                    <a href="?comic_id=<?php echo $row['comic_id']; ?>&mode=detail-comic&id=<?php echo $id; ?>"><button id="btn-goto-comic">Read</button></a>
                </section>
            </section>
            <?php
        }
    ?>
</section>