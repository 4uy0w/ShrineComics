<!DOCTYPE HTML>

<html>
    <head>
        <title>ShrineComics Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <section id="gaps-box"></section>
        <div class="login-box">
            <section id="gaps-box"></section>
            <form action="login-action.php" method="get">
                <input type="text" id="username" name="username" placeholder="username" ><br>
                <input type="password" id="password" name="password" placeholder="password" ><br>
                <input type="email" id="email" name="email" placeholder="email" ><br>
                <input type="submit" id="login" name="submit" value="login">
                <input type="reset" value="reset" name="reset" id="reset">
                <br>
            </form>
            <a href="sign-in.html"><button id="create-account">Dont have account?</button></a>
            <br>
        </div>
        <?php
            $status_login = $_GET['status'];
            if($status_login == 'invalid_user'){
        ?>
            <div class="error-box">
                <p> username or password is invalid </p>
            </div>
        <?php
            }
        ?>
    </body>
</html>