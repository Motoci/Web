<link rel="stylesheet" href="css/styles.css" />

<!-- login form starts-->

<div class="login-form">
    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="/includes/login.inc.php" method="post">
        <h3>sign in</h3>

        <span>username</span>
        <input type="email" class="box" name="usernameLogin" placeholder="enter your email" />
        <span>password</span>
        <input type="password" class="box" name="passwordLogin" placeholder="enter your password" />

        <div class="checkbox">
            <input type="checkbox" name="remember-me" />
            <label for="remember-me"> remember me </label>
        </div>
        <button type="submit" name="submit" class="btn">Sign in</button>
        <?php
        if (isset($_GET["newPwd"])) {
            if ($_GET["newPwd"] == "passwordUpdated") {
                echo '<p> Your password has been reset!</p>';
            }
        }
        ?>
        <p>forget password ? <a href="resetPassword.php"> click here </a></p>
        <p>
            don't have an account ?
            <a href="signUp.php" id="create-account-btn"> create one </a>
        </p>
    </form>
</div>

<!-- login form ends -->

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyInput") {
        echo "<p style='text-align: center; font-size: large; color: black;'> Please fill in all the fields!! </p>";

    } else if ($_GET["error"] == "invalidUsername") {
        echo "<p style='text-align: center; font-size: large; color: black;'>  Invalid Username!! </p>";

    } else if ($_GET["error"] == "invalidPassword") {
        echo "<p style='text-align: center; font-size: large; color: black;'>  Invalid Password!! </p>";

    }
}
?>
