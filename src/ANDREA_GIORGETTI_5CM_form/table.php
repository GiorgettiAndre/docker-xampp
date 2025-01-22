<?php
require_once "../mysqli.php";

if(isset($_GET))
{
    $result = $conn->query("SELECT * FROM " . $_GET['table']);
    
}