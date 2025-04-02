<?php
//pagina che manda un json che un html

header("Content-Type: application/json");

$data = [
    ['nome'=>'mario', 'cognome'=>'rossi', 'eta'=>19],
    ['nome'=>'federico', 'cognome'=>'bolli', 'eta'=>26],
    ['nome'=>'luca', 'cognome'=>'verdi', 'eta'=>22]
];

echo json_encode($data);
?>