<?php
$dati = array();
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $dati = ["username", "email", "password", "nome", "cognome", "telefono", "residenza", "viaResidenza", "cap", "genere", "dataNascita", "luogoNascita"];
    $_POST["password"] = md5($_POST["password"]); //eseguo l'hash della password
}
?>

<html>
    <head>
        <title>stampa infos</title>
    </head>
    <body>
        <?php
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
            for($i = 0; $i < count($dati); $i++)
                echo $_POST[$dati[$i]] . "<br>";
        }
        ?>
    </body>
</html>