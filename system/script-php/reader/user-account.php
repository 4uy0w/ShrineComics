<?php 

    $id = $_GET["id"];

    $sql_query = "SELECT * FROM user WHERE user_id=$id";
    $result = mysqli_query($server,$sql_query);

    $row = mysqli_fetch_array($result);

?>

<section class="user-account-area">
    <section class="user-account-box">
        <h3>username: <?php echo $row["username"]; ?></h3>
        <h3>password: <?php echo $row["password"]; ?></h3>
        <h3>email: <?php echo $row["email"]; ?></h3>
        <h3>address: <?php echo $row["address"]; ?></h3>
        <h3>telephone number: <?php echo $row["telephone_number"]; ?></h3>
        <h3>point: <?php echo $row["point"]; ?></h3>
        <h3>role: <?php echo $row["role"]; ?></h3>
    </section>
    <section class="action-area">
        <a href="?mode=normal-dashboard&id=<?php echo $id; ?>"><button id="back-button">back</button></a>
    </section>
</section>