<?php
require_once "db_constants.php";
?>

<html>
<head>
    <title>Sing in</title>
</head>
<body>

    <form action="config.php" method="post">
        <?php
        if($res == AccountAlreadyExists)
            echo '<h2 style="color: red;">Account already exists</h2>';
        else if($res == WrongConfirmPW)
            echo '<h2 style="color: red;">Wrong confirm password</h2>';
        else
            echo "<h2>Sing in</h2>";
        ?>

        <label for="user_name">Username:</label>
        <input type="text" name="user_name" id="user_name">
        <br>

        <label for="user_pw">Password:</label>
        <input type="password" name="user_pw" id="user_pw">
        <br>

        <label for="confirm_user_pw">Confirm Password:</label>
        <input type="password" name="confirm_user_pw" id="confirm_user_pw">
        <br>

        <input type="submit" name="pag" id="pag" value="Sign in">
        
        <a href="login.php">Accedi</a>
    </form>
    
</body>
</html>