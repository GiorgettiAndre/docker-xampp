<?php
require_once "dbconn.php";

//controllo cookies
if(isset($_COOKIE["user_name"]) && isset($_COOKIE["user_pw"]))
{
    $user_name = htmlspecialchars($_COOKIE["user_name"]);
    $user_pw = htmlspecialchars($_COOKIE["user_pw"]);

    $res = $conn->query("SELECT * FROM user_account WHERE user_name = '$user_name' AND user_pw = '$user_pw';");
    if($res->num_rows == 0)
        header("Location: login.php");
}
else
    header("Location: login.php");