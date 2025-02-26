<?php
require_once "controls.php";
require_once "l.php";
require_once "db_constants.php";
?>

<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <a href="login.php">Cambia account</a>
    <br>
    <br>


    <form action="config.php" method="post">
        <?php
        if($res == LinkAlreadyExists)
            echo '<h2 style="color: red;">Link already exists</h2>';
        else
            echo "<h2>Create link:</h2>";
        ?>

        <label for="original_link">Original Link:</label>
        <input type="text" name="original_link" id="original_link">
        <br>

        <input type="submit" name="pag" id="pag" value="Create link">
    </form>

    <br>
    <br>

    <?php
    $links = LinksOf($_COOKIE["user_name"]);
    if($links->num_rows>0)
    {
        echo "<h2 class=\"dashboard-title\">Ciao ".$_COOKIE["user_name"]."! Ecco i tuoi Links: </h2>";
        
        echo "<div class=\"centrale\"> <table>";

        echo
        "<tr>
            <th> Short Link </th>
            <th> Original Link </th>
            <th> Visits </th>
        </tr>";

        //stampo contenuto della tabella
        while ($row = $links->fetch_assoc())
        {
            echo "<tr>";
            
            $short_link = "https://3000-idx-docker-xamppgit-1736234872817.cluster-23wp6v3w4jhzmwncf7crloq3kw.cloudworkstations.dev/LinkShortener/?link=".$row["short_link"];
            $original_link = $row["original_link"];
            $visits = $row["n_visits"];

            echo "
            <td id=\"table-short_link\"> $short_link </td>
            <td id=\"table-original_link\"> <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"$original_link\"> $original_link </a> </td>
            <td id=\"table-visits\"> $visits </td>
            ";

            echo "</tr>";
        }

        echo "</table> </div>";
    }
    else
        echo "<h2 class=\"centrale\">".$_COOKIE["user_name"].", Non hai link salvati :(</h2>";
    ?>
</body>
</html>