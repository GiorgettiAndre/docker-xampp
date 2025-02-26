<?php
function LinksOf($user)
{
    //instauro la connessione
    $conn = new mysqli("db", "user", "user", "link_shortener", 3306);
    if($conn->connect_error)
        die("so morto" . $conn->connect_error);

    $res = $conn->query("SELECT L.short_link, L.original_link, L.n_visits FROM link L WHERE L.user_name = '$user';");
    return $res;
}