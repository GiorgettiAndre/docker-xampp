<?php
include "controls.php"

$conn->query("SELECT  FROM utente WHERE username = '$username'");
$row = $conn->result->fetch_assoc();

?>

<html>
    <head>

    </head>
    <body>
        <h1>Ciao <?php echo $_COOKIE['username']?>, hai la maschera <?php echo $row['maschera']?> </h1>
    
        <?php
        $res = $conn->query("SELECT maschera, COUNT(*) FROM utente GROUP BY maschera;");
        
        echo "<table>"
            
        while($row = $res->fetch_assoc())
            echo "<tr><td>" . $row['maschera'] . "</td><td>" . $row['COUNT(*)'] . "</td></tr>";

        echo "</table>"

        ?>
    
    </body>
</html>