<?php

session_start();
require 'connect.php';

$minLength = 6;

if (isset($_POST['username'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_Password']);

    if (empty($username)) {
        $_SESSION['error'] = "Please enter your username";
        header('Location: register.php');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Please enter a valid email address";
        header('Location: register.php');
    } elseif (strlen($password) < $minLength){
        $_SESSION['error'] = "Please enter a valid password";
        header('Location: register.php');
    } elseif ($password !== $confirmPassword){
        $_SESSION['error'] = "Your passwords do not match";
        header('Location: register.php');
    } else {
        $checkUsername = mysqli_prepare($conn, "SELECT COUNT(*) FROM users WHERE username = ?");
        mysqli_stmt_bind_param($checkUsername, 's', $username);
        mysqli_stmt_execute($checkUsername);
        mysqli_stmt_bind_result($checkUsername, $userNameExists);
        mysqli_stmt_fetch($checkUsername);
        mysqli_stmt_close($checkUsername);

        $checkEmail = mysqli_prepare($conn, "SELECT COUNT(*) FROM users WHERE email = ?");
        mysqli_stmt_bind_param($checkEmail, 's', $email);
        mysqli_stmt_execute($checkEmail);
        mysqli_stmt_bind_result($checkEmail, $userEmailExists);
        mysqli_stmt_fetch($checkEmail);
        mysqli_stmt_close($checkEmail);

        if($userNameExists > 0){
            $_SESSION['error'] = "Username already exists";
            header('Location: register.php');
        } elseif($userEmailExists > 0){
            $_SESSION['error'] = "Email already exists";
            header('Location: register.php');
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashedPassword);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                $_SESSION['success'] = "Registration Successful";
                header('Location: login.php');
            } else {
                $_SESSION['error'] = "Something went wrong, please try again";
                header('Location: register.php');
            }
            mysqli_stmt_close($stmt);
        }
    }
}

?>
