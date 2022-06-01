<?php

function emptyInputSignup($firstName, $lastName, $email, $password, $passwordRepeat): bool
{
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $isEmptySignUp = true;
    } else {
        $isEmptySignUp = false;
    }
    return $isEmptySignUp;
}

function invalidName($name): bool
{
    if (!preg_match('/^[a-zA-Z\d]*$/', $name)) {
        $isInvalid = true;
    } else {
        $isInvalid = false;
    }
    return $isInvalid;
}

function passwordMatch($password, $passwordRepeat): bool
{
    if ($password !== $passwordRepeat) {
        $notMatching = true;
    } else {
        $notMatching = false;
    }
    return $notMatching;
}

function emailExists($conn, $email)
{
    $sql = "select * from users where usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signUp.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }

//    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstName, $lastName, $email, $password): void
{
    $sql = "insert into users (usersFirstName, usersLastName, usersEmail, usersPassword) values (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signUp.php?error=stmtFailedCreateUser");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signUp.php?error=none");

}

function emptyInputLogin($username, $password): bool
{
    if (empty($username) || empty($password)) {
        $isEmptyLogin = true;
    } else {
        $isEmptyLogin = false;
    }
    return $isEmptyLogin;
}

function loginUser($conn, $username, $password): void {
     $usernameExists = emailExists($conn, $username);

     if ($usernameExists === false) {
         header("location: ../login.php?error=invalidUsername");
         exit();
     }

     $passwordHashed = $usernameExists["usersPassword"];
     $check_password = password_verify($password, $passwordHashed);

     if ($check_password === false) {
         header("location: ../login.php?error=invalidPassword");
     } else {
        session_start();
        $_SESSION["userID"] = $usernameExists["usersID"];
        $_SESSION["userEmail"] = $usernameExists["usersEmail"];
        header("location: ../index.php");
     }
    exit();
}

function emptyCheckbox($checkbox): bool {
    if (empty($checkbox)) {
        return true;
    }
    return false;
}

function getData($conn) {
    $sql = "select * from products";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        echo "Database is empty";
        exit();
    }
    return $result;
}
