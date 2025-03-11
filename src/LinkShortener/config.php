<?php
//pagina di config dove le pagine che fanno richieste POST e vogliono comunicare col DB passano per questa pagina

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pag"]))
{
    //si prende la pagina da dove origina la richiesta
    $pag = htmlspecialchars($_POST["pag"]);

    //si includono i file necessari per la comunicazione col DB
    require_once "dbconn.php";
    require_once "db_constants.php";
    
    //se settati, prende l'username e password(ashato) senza caratteri speciali
    if(isset($_POST["user_name"]) && isset($_POST["user_pw"]))
    {
        $user_name = htmlspecialchars($_POST["user_name"]);
        $user_pw = md5(htmlspecialchars($_POST["user_pw"]));
    }

    //se la pagina e' quella rivolta alla creazione del link lo crea unendo il link originale con l'username preso dai cookie
    if($pag == "Create link")
    {
        $original_link = htmlspecialchars($_POST["original_link"]);
        $user_name = htmlspecialchars($_COOKIE["user_name"]);
        $short_link = md5($user_name . $original_link);

        $res = $conn->query("SELECT * FROM link WHERE short_link = '$short_link';");
        if($res->num_rows > 0)
            header("Location: dashboard.php?db_result=" . LinkAlreadyExists); //se gia' esiste lo comunica
        else
        {
            $conn->query("INSERT INTO link (short_link, original_link, user_name) VALUES ('$short_link', '$original_link', '$user_name')");
            header("Location: dashboard.php");
        }
    }
    //dalla pagina di login controlla se l'user esiste e poi verifica la password, infine setta i cookie
    else if($pag == "Login")
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
    //dalla pagina di registrazione controlla se la seconda password corrisponde alla prima, poi verifica se l'user non esiste e altrimenti mette l'utente in DB
    else if($pag == "Sign in")
    {
        $confirm_user_pw = md5(htmlspecialchars($_POST["confirm_user_pw"]));
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