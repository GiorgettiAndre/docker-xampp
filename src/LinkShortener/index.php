<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["l"]))
{ 
    require_once "dbconn.php";

    $short_link = htmlspecialchars($_GET["l"]);
    $res = $conn->query("SELECT original_link, n_visits FROM link L WHERE L.short_link = '$short_link';");
    if($res->num_rows === 0)
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
else
{
    require_once "controls.php";
    header("Location: dashboard.php");
}

/* 
require_once "controls.php";
header("Location: dashboard.php");
*/