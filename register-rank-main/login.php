<?php
    define('MY_APP', true);
    require 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ login</title>
</head>
<body>
    <h1>Login Account</h1>

    <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger" role="alert">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
    <?php }?>

    
    <form action="login_db.php" method="post">
        <div>
            <input name = "username" type="username" placeholder="Username" required>
        </div>
        <br>
        <div>
            <input name = "password" type="password" placeholder="Password" required>
        </div>
        <button name = "login" type ="submit">Login</button>
        <br>
        <a href="register.php">Create New Account</a>
    </form>
</body>
</html>