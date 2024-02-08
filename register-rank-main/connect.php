<?php

if (!defined('MY_APP')) {
    header('Location: login.php');
    exit;
}


    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'tebletoptopia';
 

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // ตั้งค่า PDO error mode เป็น exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    

?>