<?php

if (isset($_POST["submit"])) {
    $username = $_POST["usernameLogin"];
    $password = $_POST["passwordLogin"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=emptyInput");

        exit();
    }

    loginUser($conn, $username, $password);

} else {
    header("location: ../login.php");
    exit();
}

