<?php
session_start();

//inizializzazione
$username = "[null]";

//condizioni per verificare la sessione corrente
if(isset($_SESSION["username"]) and isset($_SESSION["email"]))
{
    //credenziali in sessione
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    
    //connessione al db
    $conn = new mysqli("db", "user", "user", "chat_room", 3306);
    if($conn->connect_error)
        die("so morto" . $conn->connect_error);

    //verifico l'esistenza dell'utente nel db
    $res = $conn->query("SELECT * FROM account WHERE username_account = '$username' AND email = '$email'");
    
    //decido la stradas
    if($res->num_rows == 0)
        header("Location: Login.php");
}
else
    header("Location: Login.php");

//header standard delle pagine
$header ='
<!DOCTYPE html>
<head>
    <!--titolo della pagina-->
    <title>Chat Room</title>

    <!--CSS impostazioni per la lo stile in file esterno--> 
    <link rel="stylesheet" type="text/css" href="includes/style.css">

</head>
<body>
    <header>
        <!--titolo visivo-->
        <h1>Chat Room</h1>
        <nav><!--una sezione dedicata ad una lista di link-->
            <ul>
                <li><a href="Login.php">'.$username.'</a></li>
                <li><a href="Dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>
';

//footer standard delle pagine
$footer ='
    <footer>
        <p> il miglior discord di sempre </p>
    </footer>
</body>
</html>
';

//nome della pagina
$filename = htmlspecialchars($_SERVER["PHP_SELF"]);