<?php 

    $id = $_GET["id"];
    $mode = $_GET["mode"];

    include "../../koneksi.php";

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Reader Page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="reader-area">
            <section class="navbar">
                <a href="?mode=user-account&id=<?php echo $id; ?>">Account</a>
            </section>
            <div class="view-area">
                <div class="view-bos">
                    <?php

                        if($mode == "normal-dashboard"){
                            include "normal-dashboard.php";
                        }else if($mode == "detail-comic"){
                            include "detail-comic.php";
                        }else if($mode == "detail-account"){
                            include "detail-account.php";
                        }else if($mode == "user-account"){
                            include "user-account.php";
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>