<?php
if (isset($_COOKIE['visite']))
    $visite = $_COOKIE['visite'] + 1;
else
    $visite = 1;

setcookie('visite', $visite, time());

echo "Hai visitato questa pagina " . $visite . " volte.";



$dati = file_get_contents("miofile.txt");
file_put_contents("miofile.txt", $dati . 'esempio bla bal abla.');



$handle = fopen("esempio2.txt", "w");
fwrite($handle, "Questo è un test\n");
fclose($handle);

// Apertura in modalità lettura
$handle = fopen("esempio2.txt", "r");
$contenuto = fread($handle, filesize("esempio2.txt"));
fclose($handle);


$handle = fopen("test.txt", "w+");
fwrite($handle, "Test w+");
rewind($handle);
echo fread($handle, 100);
fclose($handle);

/* 
    "r" → sola lettura
    "w" → sola scrittura (sovrascrive)
    "a" → scrittura in fondo (append)
    "r+" → lettura/scrittura
    "a+" → lettura/scrittura in fondo
*/
?>
