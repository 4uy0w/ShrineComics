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
            <div class="show-box">
                <div class="show-container">
                    <section class="comic-description">
                        <section class="description-box">
                            <p id="text-desc"><b>Nama:</b><?php echo $row["comic_title"]; ?></p>
                            <p id="text-desc"><b>Price:</b><?php echo $row["comic_price"]; ?></p>
                            <p id="text-desc"><b>Page:</b><?php echo $row["comic_page"]; ?></p>
                            <p id="text-desc"><b>Writer:</b><?php echo $row["comic_writer"]; ?></p>
                            <p id="text-desc"><b>Genre:</b><?php echo $row["comic_genre"]; ?></p>
                            <p id="text-desc"><b>Release Date:</b><?php echo $row["comic_release_date"]; ?></p>
                            <p id="text-desc"><b>Comment:</b></p>
                            <section class="writrer-comment">
                                <?php echo $row["comic_comment"]; ?>
                            </section>
                        </section>
                    </section>
                    <section class="comic-show">
                        <img src="<?php echo $row["comic_image"]; ?>">
                    </section>
                    <section class="action-box">
                        <a href="index.php?id=<?php echo $id_admin?>"><button id="button-back">Back</button></a>
                        <a href="delete.php?id_comic=<?php echo $id_comic; ?>&id_writer=<?php echo $id_admin; ?>"><button id="button-delete">Delete</button></a>
                        <a href="edit.php?id_comic=<?php echo $id_comic; ?>&id_writer=<?php echo $id_admin; ?>"><button id="button-edit">Edit</button></a>
                    </section>
                </div>
            </div>
        </div>
        <script src="script.js">
        </script>
    </body>
</html>