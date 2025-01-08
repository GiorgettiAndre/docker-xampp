<?php
try{
    $conn = new PDO("mysql:host=db;dbname=root_db;charset=utf8mb4", "user", "user"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "daje (PDO)";
}
catch (PDOException $e) { die("so morto"); }