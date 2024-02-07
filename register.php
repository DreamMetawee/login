<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบัญชีของคุณ</title>
</head>
<body>
    <h1>Register User Account</h1>

    <form action="process_register.php" method="post">
        <div>
            <input name = "username_account" type="text" placeholder="Username" required>
        </div>
    <br>
        <div>
            <input name = "email_account" type="email" placeholder="Email" required>
        </div>
    <br>
        <div>
            <input name = "password_account1" type="password" placeholder="New Password" required>
        </div>
    <br>
        <div>
            <input name = "password_account2" type="password" placeholder="Confirm Password" required>
        </div>
    <br>
        <button type="submit">Register</button>
    <br>
        <a href="login.php">Already have an account</a>
    </form>
</body>
</html>