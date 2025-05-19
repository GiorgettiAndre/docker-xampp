<?php
$conn = new mysqli('');
if($conn->connect_error)
    die("so morto" . $conn->connect_error);