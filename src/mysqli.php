<?php
$conn = new mysqli("db", "user", "user", "root_db", 3306);
if($conn->connect_error)
    die("so morto");
echo "daje (mysqli)";
$conn->close();