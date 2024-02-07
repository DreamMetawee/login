<?php
    
    require 'connect.php'; // สมมติว่าไฟล์นี้มีการเชื่อมต่อฐานข้อมูลอยู่แล้ว

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username_account'];
        $email = $_POST['email_account'];
        $password1 = $_POST['password_account1'];
        $password2 = $_POST['password_account2'];

        if ($password1 !== $password2) {
            die('รหัสผ่านไม่ตรงกัน กรุณากลับไปและพยายามอีกครั้ง');
        }

        $hashed_password = password_hash($password1, PASSWORD_ARGON2ID);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashed_password]);


            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            die("เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $e->getMessage());
        }
    }
?>
