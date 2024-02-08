<?php

session_start();

require 'connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (empty($username)) {
    $_SESSION['error'] = "Please enter your username";
    header('Location: login.php');

} elseif (empty($password)) {
    $_SESSION['error'] = "Please enter a valid password";
    header('Location: login.php');
    
} else {
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$username]);
        $userData = $stmt->fetch();

        if ($userData && password_verify($password, $userData['password'])) {
            $_SESSION['user_id'] = $userData['id'];
            header('Location: dashboard.php');
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header('Location: login.php');
        }

    } catch (PDOException $e) {
        $_SESSION['error'] = "Something went wrong, please try again";
        header('Location: login.php');
    }
}

?>