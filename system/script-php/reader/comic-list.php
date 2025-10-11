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
                <section class="comic-card-image">
                    <img src="<?php echo $row["comic_image"]; ?>">
                </section>
                <section class="comic-card-title">
                    <a href="?mode=detail-comic&comic_id=<?php echo $row["comic_id"]; ?>&id=<?php echo $id;?>"><?php echo $row["comic_title"]?></a>
                </section>
            </section>
            <?php
        }
    ?>
</section>