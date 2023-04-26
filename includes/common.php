<?php

    if(!isset($_SESSION['email']))
    {
        session_start();
    }
    $host = "localhost";
    $port = "5432";
    $dbname = "SIH";
    $user = "root";
    $password = "password"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    if(!$connection_string){  echo "Error : Unable to open database\n"; header("location:fail.php");} 
    $dbconn = pg_connect($connection_string);
?>