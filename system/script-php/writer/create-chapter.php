<?php 

    $id = $_GET["id"];

?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Create New Comic</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="create-new-comic-area">
            <div class="create-new-comic-box">
                <h1 id="header-text">Create New Chapter Cluster</h1>
                <div class="create-new-comic-form">
                    <form action="create-chapter-action.php" method="post" enctype="multipart/form-data">
                        <section class="input-new-comic-area">
                            <p id="new-comic-title">chapter name</p>
                            <input type="text" name="chapter-title" id="comic_title" placeholder="chapter title">
                        </section>
                        <section class="input-new-comic-area">
                            <p id="new-comic-title">chapter owner</p>
                            <input type="text" name="chapter-writer" id="comic_writer" placeholder="chapter writer">
                        </section>
                         <section class="input-new-comic-area">
                            <p id="new-comic-title">chapter comment</p>
                            <textarea name="chapter-comment" id="comic_comment"></textarea>
                        </section>
                        <section class="submit-new-comic-area">
                            <button type="submit" id="submit-button"><b>create chapter</b></button>
                            <a href="index.php?id=<?php echo $id; ?>"><button type="button" id="back-button"><b>back</b></button></a>
                        </section>
                    </form>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>