<?php
 #  token
if (isset($_POST["resetPasswordSubmit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../createNewPassword.php?newPwd=empty");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../createNewPassword.php?newPwd=pwdNotTheSame");
        exit();
    }

    $currentDate = date("U");

    require 'dbh.inc.php';

    $sql = "select * from pwdReset where pwdResetSelector=? and pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("There was an error");
    }
    mysqli_stmt_bind_param($stmt, "s", $selector);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
        die("You need to resubmit your request!");
    }
    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

    if ($tokenCheck === false) {
        die("You need to re-submit your reset request!");
    }
    $tokenEmail = $row["pwdResetEmail"];

    $sql = "select * from users where usersEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("There was an error!");
    }
    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_stmt_get_result($stmt)) {
        die("There was an error!");
    }

    $sql = "update users set usersPassword = ? where usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("There was an error!");
    }
    $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
    mysqli_stmt_execute($stmt);

    $sql = "delete from pwdReset where pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("There was an error!");
    }

    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
    mysqli_stmt_execute($stmt);
    header("Location: ../signUp.php?newPwd=passwordUpdated");





} else {
    header("Location: ../index.php");
}
