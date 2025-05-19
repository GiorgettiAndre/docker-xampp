<?php
include "controls.php"

if(isset($_GET["mask"]))
{
    $mask = htmlspecialchars($_GET["mask"]);

    $res = $conn->query("SELECT * FROM utente WHERE maschera = '$mask'");

    if($res->num_rows >= 50)
        echo "la maschera e' piena";
    else
    {
        $conn->query("UPDATE utente SET maschera = '$mask' WHERE username = '$username'");
        header("Location: dashboard.php")
    }
}

?>
<html>
    <head>
        <title>Scelta mask</title>
    </head>
</html>
<body>
    <form action="sceltamask.php" method="get">
        <?php
            $res = $conn->query("SELECT * FROM maschere;")

            while($row = $res->fetch_assoc())
            {
                $maskname = $row['nome'];
                echo '<input type="submit" name="mask" value="'$maskname'"><br>';
            }
        ?>
    </form>
</body>