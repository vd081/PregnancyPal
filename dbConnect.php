<?php
$host_name = 'localhost';
$database = 'B00658339';
$user_name = 'B00658339';
$password = 'Password1';

try {
    $conn = new PDO("mysql:host=$host_name;dbname=$database;charset=utf8", $user_name, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connection to MYSQL server successfully established!"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>