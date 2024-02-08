<?php

session_start();
require 'connect.php';


// ดึงรายละเอียดผู้ใช้จากฐานข้อมูล
$stmt = mysqli_prepare($conn, "SELECT username, email FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $username, $email);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="text-center" style="background: url('img/space_bg.webp') no-repeat center center; background-size: cover;">
    <section class="vh-100 gradient-custom">
    <div class="container mt-5 h-100">
        
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <h1 class="fw-bold mb-2 text-uppercase">Dashboard - Space Theme</h1>
                <p class="text-white-50 mb-5">Welcome to your dashboard!</p>
                    <div class="card-header">Profile Info</div>
                    <div class="card-body p-5 text-center">
                        <p><strong>Username:</strong>
                            <?php echo $username; ?>
                        </p>
                        <p><strong>Email:</strong>
                            <?php echo $email; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

</html>
