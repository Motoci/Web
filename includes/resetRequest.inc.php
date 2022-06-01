<?php

if (isset($_POST["resetPasswordSubmit"])) {

    try {
        $selector = bin2hex(random_bytes(8));
    } catch (Exception $e) {
    }

    try {
        $token = random_bytes(32);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }

    $url = "http://localhost:8888/createNewPassword.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U", 1800);

    include_once 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "delete from pwdReset where pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("There was an error");
    }
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);


    $sql = "insert into pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) values (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("There was an error");
    }
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = "Reset your password for local Website";

    $message = '<p> We received your password reset request. The link to reset your password is below. Ignore otherwise. </p>';
    $message .= '<p> Here is your password reset link: </p>';
    $message .= '<a href="' . $url . '">' . $url . '</a>';


    #PHPMailer class
    require '../PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML(true);
    $mail->Username = 'motococtavian71@gmail.com';
    $mail->Password = 'AnthonyMcGregor88';
    $mail->setFrom('motococtavian18@gmail.com');
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }

    header("Location: ../resetPassword.php?reset=success");

} else {
    header("Location: ../login.php");
    exit();
}