<link rel="stylesheet" href="css/styles.css" />

<!-- reset-password form starts -->

<div class="login-form">
    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="includes/resetRequest.inc.php" method="post">
        <h3>Reset forgotten password</h3>
        <p style="text-transform: none; margin-bottom: 10px"> An email will be sent to you with instructions on how to reset your password </p>

        <input type="email" class="box" name="email" placeholder="enter your email" />
        <button type="submit" name="resetPasswordSubmit" class="btn">Get Email</button>
    </form>
    <?php
    if (isset($_GET["reset"])) {
        if ($_GET["reset"] == "success") {
            echo '<p class="signUpSuccessful"> Check your email! </p>';
        }
    }
    ?>
</div>

