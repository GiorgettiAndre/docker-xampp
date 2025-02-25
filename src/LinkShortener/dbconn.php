<?php
//instauro la connessione
$conn = new mysqli("db", "user", "user", "link_shortener", 3306);
if($conn->connect_error)
    die("so morto" . $conn->connect_error);