<?php
$dati_post = array();
$dati_get = array();

if(isset($_POST["password"]))
    $_POST["password"] = md5($_POST["password"]); //eseguo l'hash della password 

if(isset($_SERVER["REQUEST_METHOD"]))
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
        $dati_post = ["username", "email", "password", "nome", "cognome", "telefono", "residenza", "viaResidenza", "cap", "genere", "dataNascita", "luogoNascita"];
    else if($_SERVER["REQUEST_METHOD"] == "GET")
        $dati_get = ["search"];
}
?>

<html>
    <head>
        <title>stampa infos</title>
    </head>
    <body>
        <?php
        for($i = 0; $i < count($dati_post); $i++)
            echo $i+1 .')'. $_POST[$dati_post[$i]] . "<br>";
        
        echo "<br><br>";

        for($i = 0; $i < count($dati_get); $i++)
            echo $i+1 .')'. $_GET[$dati_get[$i]] . "<br>";
        ?>
    </body>
</html>