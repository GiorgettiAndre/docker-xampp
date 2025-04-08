<?php
header("Content-Type: application/json");

$data = [
    ['nome'=>'andrea', 'cognome'=>'giorgetti', 'eta'=>69],
    ['nome'=>'federico', 'cognome'=>'bolli', 'eta'=>2],
    ['nome'=>'leonardo', 'cognome'=>'sandroni', 'eta'=>53550]
];

echo json_encode($data);
?>