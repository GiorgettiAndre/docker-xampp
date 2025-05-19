<?php
include "dbconn.php";

if(isset($_COOKIE['username']) /* && password ecc */)
{
    $username = $_COOKIE['username'];

    $conn->query("SELECT * FROM utente WHERE username = '$username'");

    $result = $conn->result;

    if($result === 0)
        header("Location: login.php");
}
else
    header("Location: login.php");

/* PER OGNI CAZZO DI PAGINA include "controls.php" */