<?php
    function PrintMethod($method)
    {
        foreach($method as $key => $value)
            echo $key .' => '. $method[$key] . "<br>";

        echo "<br>";
        echo "print_r:<br>";
        print_r($method);
        echo "<br>";
        echo "var_dump:<br>";
        var_dump($method);
    }
?>

<html>
    <head>
        <title>stampa infos</title>
    </head>
    <body>
        <?php
            if(isset($_POST["password"]))
                $_POST["password"] = md5($_POST["password"]); //eseguo l'hash della password 

            if(isset($_SERVER["REQUEST_METHOD"]))
            {
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    echo "<h2>Richiesta POST</h2>";
                    PrintMethod($_POST);
                }
                else if($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    echo "<h2>Richiesta GET</h2>";
                    PrintMethod($_GET);
                }
            }
        ?>
    </body>
</html>