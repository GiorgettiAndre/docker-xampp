<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pag"]))
{
    require_once "dbconn.php";
    require_once "db_constants.php";
    
    if(isset($_POST["user_name"]) && isset($_POST["user_pw"]))
    {
        $user_name = $_POST["user_name"];
        $user_pw = md5($_POST["user_pw"]);
    }

    if($_POST["pag"] == "Create link")
    {
        $original_link = $_POST["original_link"];
        $user_name = $_COOKIE["user_name"];
        $short_link = md5($user_name . $original_link);

        $res = $conn->query("SELECT * FROM link WHERE short_link = '$short_link';");
        if($res->num_rows > 0)
            header("Location: dashboard.php?db_result=" . LinkAlreadyExists);
        else
        {
            $conn->query("INSERT INTO link (short_link, original_link, user_name) VALUES ('$short_link', '$original_link', '$user_name')");
            header("Location: dashboard.php");
        }
    }
    else if($_POST["pag"] == "Login")
    {
        $res = $conn->query("SELECT * FROM user_account WHERE user_name = '$user_name';");
        if($res->num_rows == 0)
            header("Location: login.php?db_result=" . AccountDoesntExists);
        else
        {
            $res = $conn->query("SELECT * FROM user_account WHERE user_name = '$user_name' AND user_pw = '$user_pw';");
            if($res->num_rows == 0)
                header("Location: login.php?db_result=" . WrongPW);
            else
            {   
                setcookie("user_name", $user_name, time() + 259200 );
                setcookie("user_pw", $user_pw, time() + 259200 );
                header("Location: dashboard.php");
            }
        }
    }
    else if($_POST["pag"] == "Sign in")
    {
        $confirm_user_pw = md5($_POST["confirm_user_pw"]);
        if($user_pw != $confirm_user_pw)
            header("Location: sign_in.php?db_result=" . WrongConfirmPW);
        else
        {
            $res = $conn->query("SELECT * FROM user_account WHERE user_name = '$user_name';");
            if($res->num_rows != 0)
                header("Location: sign_in.php?db_result=" . AccountAlreadyExists);
            else
            {   
                $conn->query("INSERT INTO user_account (user_name, user_pw) VALUES ('$user_name', '$user_pw')");
                setcookie("user_name", $user_name, time() + 259200 );
                setcookie("user_pw", $user_pw, time() + 259200 );
                header("Location: dashboard.php");
            }
        }
    }
}