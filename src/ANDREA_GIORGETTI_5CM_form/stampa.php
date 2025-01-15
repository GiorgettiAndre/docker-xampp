<html>
    <head>
        <title>stampa infos</title>
    </head>
    <body>
        <?php
            $dati_post = array();
            $dati_get = array();

            if(isset($_POST["password"]))
                $_POST["password"] = md5($_POST["password"]); //eseguo l'hash della password 

            if(isset($_SERVER["REQUEST_METHOD"]))
            {
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $dati_post = ["username", "email", "password", "nome", "cognome", "telefono", "residenza", "viaResidenza", "cap", "genere", "dataNascita", "luogoNascita"];
                    echo "<h2>Richiesta POST</h2>";
                }
                else if($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    $dati_get = ["search"];
                    echo "<h2>Richiesta GET</h2>";
                }
            }

            for($i = 0; $i < count($dati_post); $i++)
                echo $i+1 .') '. $_POST[$dati_post[$i]] . "<br>";

            echo "<br><br>";

            for($i = 0; $i < count($dati_get); $i++)
                echo $i+1 .') '. $_GET[$dati_get[$i]] . "<br>";

            echo "print_r di post e get"
            print_r($dati_post);
            print_r($dati_get);
            echo "<br>";
            echo "var_dump di post e get"
            var_dump($dati_post);
            var_dump($dati_get);
        ?>
    </body>
</html>