<?php
session_start();

//nome della pagina
$filename = htmlspecialchars($_SERVER["PHP_SELF"]);

//funzione per settare la sessione
function SetSession($username, $email)
{
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
}

//instauro la connessione
const conn = new mysqli("db", "user", "user", "chat_room", 3306);
if(conn->connect_error)
    die("so morto" . $conn->connect_error);

//tipi di output
const Database = [
    "Null" => 0,
    "UsernameExists" => 1,
    "EmailExists" => 2,
    "Username&EmailExist" => 3,
    "UsernameDoesntExists" => 4,
    "EmailDoesntExists" => 5,
    "AccountDoesntExists" => 6,
    "WrongPW" => 7,
    "Success" => 8,
    "NoConfirmPW" => 9
];


function Signin($username, $email, $password)
{
    //cripto la password
    $password = md5($password);
    //guardo se nel db c'e l'username
    $res_username = conn->query("SELECT * FROM account WHERE username_account = '$username'");
    //guardo se nel db c'e l'email
    $res_email = conn->query("SELECT * FROM account WHERE email = '$email'");

    if($res_username->num_rows > 0 and $res_email->num_rows > 0)
        return Database["Username&EmailExist"];
    if($res_username->num_rows > 0)
        return Database["UsernameExists"];
    if($res_email->num_rows > 0)
        return Database["EmailExists"];

    conn->query("INSERT INTO account (username_account, email, password_account) VALUES ('$username', '$email', '$password')");
    return Database["Success"];
}

function Login($username, $email, $password)
{
    //cripto la password
    $password = md5($password);

    //guardo se nel db c'e l'username
    $res_username = conn->query("SELECT * FROM account WHERE username_account = '$username'");
    //guardo se nel db c'e l'email
    $res_email = conn->query("SELECT * FROM account WHERE email = '$email'");

    if($res_username->num_rows == 0 and $res_email->num_rows == 0)
        return Database["AccountDoesntExists"];
    if($res_username->num_rows == 0)
        return Database["UsernameDoesntExists"];
    if($res_email->num_rows == 0)
        return Database["EmailDoesntExists"];

    $res = conn->query("SELECT * FROM account WHERE username_account = '$username' AND email = '$email' AND password_account = '$password'");
    if($res->num_rows == 0)
        return Database["WrongPW"];

    return Database["Success"];
}