<?php
const Success = 1;
const AccountDoesntExists = 2;
const WrongPW = 3;
const AccountAlreadyExists = 4;
const WrongConfirmPW = 5;
const LinkAlreadyExists = 6;

//controllo costante di ritorno
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["db_result"]))
    $res = (int) $_GET["db_result"];
else
    $res = 0;