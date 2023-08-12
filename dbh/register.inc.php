<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    require 'administration.php';

    if(invalidEmail($email) !== false){
        header('Location: ../index.php?error=invalidEmail');
        exit();
    }

    if(emailExists($email) !== false){
        header('Location: ../index.php?error=usernameExists');
        exit();
    }

    createUser($fullname, $email, $pwd);
} else {
    header("Location: /index.php");
}