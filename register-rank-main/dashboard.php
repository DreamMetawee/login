<?php

    session_start();
    require 'connect.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
    }

    try {
        // กำหนดคำสั่ง SQL สำหรับดึงข้อมูลผู้ใช้ทั้งหมด
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <!-- เพิ่ม stylesheet link ไปยังไฟล์ style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>User Table</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </thead>
        <tbody>
            
            <?php
                // ใช้ while เพื่อวนลูปแสดงข้อมูลทุกรายการ
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['username']."</td>";
                    // แปลงค่า 'male' เป็น 'ชาย' และ 'female' เป็น 'หญิง'
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['password']."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

<?php
    // ปิดส่วนของ HTML
    } catch (PDOException $e) {
        // แสดงข้อผิดพลาดกรณีเกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล
        echo "Database Error ==> ".$e->getMessage();
    }
?>
</body>
</html>
