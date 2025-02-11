<?php
require_once "includes/db_conn.php";

$res = 0;
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $res = Database["Null"];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPW = $_POST['confirmPW'];

    if($password != $confirmPW)
        $res = Database["NoConfirmPW"];
    else
        $res = Signin($username, $email, $password);
    
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
    <title>Sign in</title>
    <link rel="stylesheet" href="includes/input_style.css">
</head>
<body>

    <div class="login-container">
        <h2>Sign in</h2>
        <form action="<?php echo $filename ?>" method="post">
            <div class="form-group">
                <?php
                require_once "includes/db_conn.php";

                if($res == Database["UsernameExists"])
                    echo '<label style="color: red;" for="Username">Username già esistente:</label>';
                else
                    echo '<label for="Username">Username:</label>';
                ?>
                <input type="text" id="Username" name="username" required>
            </div>
            <div class="form-group">
                <?php
                require_once "includes/db_conn.php";

                if($res == Database["EmailExists"])
                    echo '<label style="color: red;" for="Email">Email già esistente:</label>';
                else
                    echo '<label for="Email">Email:</label>';
                ?>
                <input type="email" id="Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="password" required>
            </div>
            <div class="form-group">
                <?php
                require_once "includes/db_conn.php";

                if($res == Database["NoConfirmPW"])
                    echo '<label style="color: red;" for="ConfirmPW">Confirm Password - le password non combaciano:</label>';
                else
                    echo '<label for="ConfirmPW">Confirm Password:</label>';
                ?>
                <input type="password" id="ConfirmPW" name="confirmPW" required>
            </div>
            <button type="submit" class="login-button">Sign in</button>
            <div class="register-link">
              <a href="Login.php">Hai già un accout? Accedi</a>
            </div>
        </form>
    </div>

</body>
</html>