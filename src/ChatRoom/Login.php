<?php
require_once "includes/db_conn.php";

$res = 0;
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $res = Database["Null"];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = Login($username, $email, $password);
    if($res == Database["Success"])
    {
        SetSession($username, $email);
        header("Location: Dashboard.php");
        exit();
    }
}
/*
"Null" => 0,
"UsernameExists" => 1,
"EmailExists" => 2,
"Username&EmailExist" => 3,
"UsernameDoesntExists" => 4,
"EmailDoesntExists" => 5,
"AccountDoesntExists" => 6,
"WrongPW" => 7,
"Success" => 8,
"NoConfirmPW" => 9
*/
?>
<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
    <div class="login-container">
        <?php
        if($res == Database["AccountDoesntExists"])
            echo '<h2 style="color: red;">Login - utente non registrato</h2>';
        else
            echo '<h2>Login</h2>';
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <?php
                if($res == Database["UsernameDoesntExists"])
                    echo '<label style="color: red;" for="Username">Username non esistente:</label>';
                else
                    echo '<label for="Username">Username:</label>';
                ?>
                <input type="text" id="Username" name="username" required>
            </div>
            <div class="form-group">
                <?php
                if($res == Database["EmailDoesntExists"])
                    echo '<label style="color: red;" for="Email">Email non esistente:</label>';
                else
                    echo '<label for="Email">Email</label>';
                ?>
                <input type="email" id="Email" name="email" required>
            </div>
            <div class="form-group">
                <?php
                if($res == Database["WrongPW"])
                    echo '<label style="color: red;" for="Password">Password errata:</label>';
                else
                    echo '<label for="Password">Password:</label>';
                ?>
                <input type="password" id="Password" name="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
            <div class="register-link">
              <a href="Signin.php">Non hai un account? Registrati</a>
            </div>
        </form>
    </div>
</body>
</html>