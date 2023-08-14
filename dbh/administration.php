<?php

require('connection.php');

if($_POST['function'] ?? null){
    echo $_POST['function']();
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function passwordMatch($pwd, $passwordConfirmation){
    if($pwd !== $passwordConfirmation){
        return true;
    } else {
        return false;
    }
}

function emailExists($email){
    global $connection;
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $query)){
        header('Location: /sections/login.php?error=sqlError', true);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($fullname, $email, $pwd){
    global $connection;
    $query = "INSERT INTO user (fullName, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $query)){
        header('Location: /sections/login.php?error=sqlError', true);
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: /sections/registered.php', true);
    exit();
}

function loginUser($email, $pwd){
    $userExists = emailExists($email);

    if($userExists === false){
        header('Location: /sections/login.php?error=wrongLogin', true);
        exit();
    }

    $pwdHashed = $userExists['password'];

    $check = password_verify($pwd, $pwdHashed);

    if($check === false){
        header('Location: /sections/login.php?error=wrongLogin', true);
        exit();
    } else if($userExists['approvated'] === 0){
        header('Location: /sections/login.php?error=notApproved', true);
        exit();
    } else if($check === true){
        session_start();
        $_SESSION["id"] = $userExists['idUser'];
        header('Location: /dashboard.php', true);
        exit();
    }
}

function checkAdministrator($id){
    global $connection;
    $query = "SELECT role.name FROM user INNER JOIN role ON user.role = role.idRole WHERE idUser = $id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    if($row['name'] == "Administrator"){
        return true;
    } else {
        return false;
    }
}

function getUser($id){
    global $connection;
    $query = "SELECT * FROM user WHERE idUser = $id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function getAdministrator(){
    global $connection;
    $query = "SELECT * FROM user WHERE role = 1";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function getUserByName($name){
    global $connection;
    $query = "SELECT * FROM user WHERE fullName = '$name'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}