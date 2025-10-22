<?php

    include "../../koneksi.php";

    $id_comic = $_GET["id_comic"];
    $id_admin = $_GET["id_writer"];

    $sql_query = "SELECT * FROM comic WHERE comic_id=$id_comic";
    $result = mysqli_query($server, $sql_query);

    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Detail of comic <?php echo $row["comic_title"]; ?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="show-area">
            <div class="show-container">
                <div class="container-comic-title">
                    <h3 id="comic-title-text"><?php echo $row["comic_title"]; ?></h3>
                </div>
                <section class="container-show-first">
                    <section class="container-show-image">
                        <img src="<?php echo $row['comic_banner']; ?>" id="comic-banner-image">
                    </section>
                    <section class="container-show-description">
                        <p id="text-title"><b>title: </b><?php echo $row["comic_title"]; ?></p>
                        <p id="text-title"><b>price: </b><?php echo $row["comic_price"]; ?></p>
                        <p id="text-title"><b>page: </b><?php echo $row["comic_page"]; ?></p>
                        <p id="text-title"><b>writer: </b><?php echo $row["comic_writer"]; ?></p>
                        <p id="text-title"><b>release date: </b><?php echo $row["comic_release_date"]; ?></p>
                        <p id="text-title"><b>genre: </b><?php echo $row["comic_genre"]; ?></p>
                    </section>
                </section>
                <section class="container-show-comment">
                    <section class="container-comment">
                        <p><?php echo $row["comic_comment"];?></p>
                    </section>
                </section>
                <section class="container-show-comic">
                    <img src="<?php echo $row["comic_image"]; ?>" id="comic-image-show">
                </section>
                <section class="comic-action-box">
                    <section class="button-place">
                        <a href="edit.php?id_comic=<?php echo $id_comic;?>&id_writer=<?php echo $id_admin; ?>"><button id="edit-btn-show"><b>Edit</b></button></a>
                        <a href="delete.php?id_comic=<?php echo $id_comic;?>&id_writer=<?php echo $id_admin; ?>"><button id="delete-btn-show"><b>Delete</b></button></a>
                        <a href="index.php?id=<?php echo $id_admin; ?>"><button id="back-btn-show"><b>Back</b></button></a>
                    </section>
                </section>
                <section class="separator-section"></section>
            </div>
        </div>
        <script src="script.js">
        </script>
    </body>
</html>