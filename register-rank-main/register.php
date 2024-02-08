<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชีของคุณ</title>
</head>
<body>
    <h1>Register User Account</h1>

    <?php if(isset($_SESSION['success'])){?>
        <div class="alert alert-success" role="alert">
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        </div>
    <?php }?>

    <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger" role="alert">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
    <?php }?>

    <form action="register_db.php" method="POST">
        <div>
            <input name = "username" type="text" placeholder="Username" required>
        </div>
    <br>
        <div>
            <input name = "email" type="email" placeholder="Email" required>
        </div>
    <br>
        <div>
            <input name = "password" type="password" placeholder="New Password" required>
        </div>
    <br>
        <div>
            <input name = "confirm_Password" type="password" placeholder="Confirm Password" required>
        </div>
    <br>
        <button type="submit">Register</button>
    <br>
        <a href="login.php">Already have an account</a>
    </form>
</body>
</html>