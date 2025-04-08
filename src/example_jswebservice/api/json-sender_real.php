<?php
header("Content-Type: application/json");

//instauro la connessione
const conn = new mysqli("db", "user", "user", "root_db", 3306);
if(conn->connect_error)
    die("so morto" . $conn->connect_error);

$res = conn->query("SELECT nome, cognome, eta FROM utenti;");

$data = [];
while($row = $res->fetch_assoc())
    $data[] = $row;


echo json_encode($data);
?>