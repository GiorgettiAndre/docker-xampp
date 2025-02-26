<?php
$conn = new mysqli("db", "root", "root", "Carnevale2025");
if($conn->connect_error)
    die("so morto" . $conn->connect_error);