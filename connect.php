<?php

if (!defined('MY_APP')) {
    header('Location: login.php');
    exit;
}


    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'userlogin';
    $port = null;
    $socket = null;


    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        $conn = new PDO($dsn, $username, $password);
        
    } catch (PDOException $e) {
        echo 'Error connect'.$e ->getMessage();


    }
    

?>