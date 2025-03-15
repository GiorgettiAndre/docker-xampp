<?php
require_once "includes/presets.php";      //impostazioni base della pagina($header, $footer e importazione stile css)
require_once "includes/roomdb_conn.php";  //connessione al db delle stanze e messaggi

//verifica del tipo di richiesta
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET")
{
    //se manda un messaggio lo inserisco nel db e riporta la pagina della stanza
    if(isset($_GET['message']))
    {
        PostMessage($_SESSION["username"], $_GET['message'], $_SESSION["room"]);
        header('Location: '.$filename.'?room='.$_SESSION["room"]);
    }

    //inserisce nella sessione il nome della stanza
    if(isset($_GET['room']))
        $_SESSION["room"] = $_GET['room'];
    elseif(!isset($_SESSION["room"]))
        $_SESSION["room"] = "null";
}

echo $header . '<h1>Stanza: '.$_SESSION["room"] .'</h1>';

//se la stanza esiste stampa ogni messaggio
if(ExistsRoom($_SESSION["room"]))
{
    echo '<div class="login-container">';
    $messages = WatchRoom($_SESSION["room"]);
    if($messages->num_rows == 0)
        echo '<label>Nessun messaggio nella stanza</label>';
    else
    {
        while ($message = $messages->fetch_assoc()) //va finchè diventa null (righe finite)
        {
            $username = $message['username_account'];
            $content = $message['content'];
            $date = $message['date_pub'];
        
            echo '
            <div class=".message-container">
                <h3>'.$username.': '.$content.'</h3>
                <h5>'.$date.'</h5>
            </div>
            ';
        }
    }
    //stampo un form per poter postare un messaggio
    echo '
    </div><br><br>
        
    <div class="login-container">
        <form name="PostMessage" action="'.$filename.'" method="get">
            <div class="form-group">
                <label for="Message">Posta un messaggio:</label><br>
                <input type="text" id="Message" name="message" required>
            </div>
            <button type="submit" class="login-button">Posta</button>
        </form>
    </div>
    ';
}
else
    echo "<br><h2>Questa stanza non esiste</h2>";

echo $footer;