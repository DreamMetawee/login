<?php

    session_start();
    require 'connect.php';

    $minLength = 6 ;

    if (isset($_POST['Register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_Password'];
    }

    if (empty($username)) {
        $_SESSION['error'] = "Please enter your username";
        header('Location: register.php');
        
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Please enter a valid email address";
        header('Location: register.php');

    }elseif (strlen($password) < $minLength){
        $_SESSION['error'] = "Please enter a valid password";
        header('Location: register.php');

    }elseif (strlen($password) !== $confirmPassword){
        $_SESSION['error'] = "Your password do not match";
        header('Location: register.php');
    }else {

        $checkUsername = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $checkUsername->execute([$username]);
        $userNameExits = $checkUsername->fetchColumn();

        $checkEmail = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $checkEmail->execute([$email]);
        $userEmailExits = $checkEmail->fetchColumn();

        if($userNameExits){
            $_SESSION['error'] = "Username already exists";
            header('Location: register.php');

        }elseif($userEmailExits){
            $_SESSION['error'] = "Email already exists";
            header('Location: register.php');

        }else{
            $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

            try {
                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$username,$email,$hashedPassword]);

                $_SESSION['success'] = "Registration Successfully";
                header('Location: register.php');
            } catch (PDOException $e) {
                $_SESSION['error'] = "Something went wrong, please try again";
                echo 'Registration failed'.$e ->getMessage();
                header('Location: register.php');
            }
        }
    }
?>