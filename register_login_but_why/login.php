
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>

                <form action="login_db.php" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        
                        <input  name="username" type="username" required>
                        <label for="">Usename</label>
                    </div>
                    <br>
                    <div class="inputbox">
                        <input  name= "password" type="password" required>
                        <label for="">Password</label>
                    </div>
                    <br>
                    <div class="forget">
                        <label for=""><input type="checkbox" id="rememberMe">Remember me</label>
                        <a href="forget_password.php">Forget Password</a>
                    </div>
                    <br>
                    <button type="submit">Login</button>

                    <div class="register">
                        <p>Don't have an account? <a href="register.php">Register</a>
                        </p>
                    </div>


                </form>


    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>