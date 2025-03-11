<?php
/* 
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["link"]))
{ 
    require_once "dbconn.php";

    $short_link = htmlspecialchars($_GET["link"]);
    $res = $conn->query("SELECT original_link, n_visits FROM link L WHERE L.short_link = '$short_link';");
    if($res->num_rows == 0)
        echo "<h1>Questo link non esiste</h1>";
    else
    {
        $row = $res->fetch_assoc();
        $visits = $row["n_visits"];
        $visits++;
        $conn->query("UPDATE link SET n_visits = $visits WHERE short_link = '$short_link'");
        header('Location: ' . $row["original_link"]);
    }
}
*/

function LinksOf($user)
{
    //instauro la connessione
    $conn = new mysqli("db", "user", "user", "link_shortener", 3306);
    if($conn->connect_error)
        die("so morto" . $conn->connect_error);

    $user = htmlspecialchars($user);

    $res = $conn->query("SELECT L.short_link, L.original_link, L.n_visits FROM link L WHERE L.user_name = '$user';");
    return $res;
}