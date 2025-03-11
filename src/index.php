<?php

if(isset($_GET['dir']))
{
    $dir = $_GET['dir'];
    header("Location: $dir");
}
else if(isset($_GET['file']))
{
    $file = $_GET['file'];
    header("Location: $file");
}

?>

<html>
    <head>
        <title>Pagina Indice</title>
    </head>
    <body>
        <form action="index.php" method="get">
            <?php
            $files = scandir('./');
            foreach ($files as $file)
            {
                if ($file !== '.' && $file !== '..' && $file !== 'index.php' && $file !== '.htaccess')
                {
                    if (is_dir('./' . $file))
                        echo "<input type=\"submit\" name=\"dir\" value=\"$file\">";
                    else
                        echo "<input type=\"submit\" name=\"file\" value=\"$file\">";
                    echo "<br>";
                }
            }
            ?>
        </form>
    </body>
</html>