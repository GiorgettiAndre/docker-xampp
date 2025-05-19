<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
if(isset($_POST["username"]) && isset($_POST["password"]))
{
    $username = htmlspecialchars($_POST["username"]);
    $password = md5(htmlspecialchars($_POST["password"]));

    include "dbconn.php";

    $conn->query("SELECT * FROM utente WHERE username = '$username';");

    $result = $conn->result;

    if($result->num_rows === 0)
    {
        $conn->query("INSERT INTO utente (username, password) VALUES ('$username', '$password'");
        header("Location: dashboard.php");
        setcookie("username", $username, time() + 124377);
        setcookie("password", $password, time() + 124377);
    }
    else
        echo "<h2>Credenziali già esistenti</h2>";
}
?>
    <form action="login.php" method="post">
        <label for="Username">Username:</label>
        <input type="text" name="username">

        <label for="Email">Email:</label>
        <input type="email" name="email">

        <label for="Password">Password:</label>
        <input type="password" name="password">

        <input type="submit" value="Login">
    </form>
</body>
</html>