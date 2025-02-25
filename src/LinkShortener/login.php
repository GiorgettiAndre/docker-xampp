<?php
require_once "db_constants.php";
?>
<!DOCTYPE html>
<head>
    <title>Login</title>
</head>
<body>
    
    <!-- class="form-access" -->
    <form action="config.php" method="post">
        <?php
        if($res == AccountDoesntExists)
            echo '<h2 style="color: red;">Account doesn\'t exists</h2>';
        else if($res == WrongPW)
            echo '<h2 style="color: red;">Wrong password</h2>';
        else
            echo "<h2>Login</h2>";
        ?>

        <label for="user_name">Username:</label>
        <input type="text" name="user_name" id="user_name">
        <br>

        <label for="user_pw">Password:</label>
        <input type="password" name="user_pw" id="user_pw">
        <br>

        <input type="submit" name="pag" id="pag" value="Login">

        <a href="sign_in.php">Crea un account</a>
    </form>

</body>
</html>