<?php

if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $checkBox = $_POST["accept-terms"];

    require_once "functions.inc.php";
    require_once "dbh.inc.php";

    if (emptyInputSignup($firstName, $lastName, $email, $password, $passwordRepeat) !== false) {
        header("location: ../signUp.php?error=emptyInput");
        exit();
    }

    if (invalidName($firstName) !== false) {
        header("location: ../signUp.php?error=invalidFirstName");
        exit();
    }

    if (invalidName($lastName) !== false) {
        header("location: ../signUp.php?error=invalidLastName");
        exit();
    }

    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("location: ../signUp.php?error=passwordMissMatch");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../signUp.php?error=emailAlreadyExists");
        exit();
    }

    if (emptyCheckBox($checkBox)) {
        header("location: ../signUp.php?error=emptyCheckbox");
        exit();
    }

    createUser($conn, $firstName, $lastName, $email, $password);
} else {
    header("location: ../signUp.php");
    exit();
}

