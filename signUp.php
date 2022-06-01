<link rel="stylesheet" href="css/styles.css" />
<!-- create account form  -->

<div class="create-account-form">
    <div id="close-create-account-btn" class="fas fa-times"></div>

    <form action="/includes/signUp.inc.php" method="post">
        <h3>create account</h3>

        <span>firstname</span>
        <input type="text" name="firstName" class="box" />
        <span>lastname</span>
        <input type="text" name="lastName" class="box" />
        <span>email</span>
        <input type="email" name="email" class="box" />
        <span>password</span>
        <input type="password" name="password" class="box" />
        <input type="password" name="passwordRepeat" class="box" placeholder="repeat password"/>

        <div class="checkbox">
            <input type="checkbox" name="accept-terms" />
            <label for="accept-terms">
                I agree to the Terms of Service and Privacy Policy
            </label>
        </div>

        <button type="submit" name="submit" class="btn">Create account</button>
    </form>

</div>

<!-- create account form ends -->

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyInput") {
        echo "<p style='text-align: center; font-size: large;'> Please fill in all the fields!! </p>";

    } else if ($_GET["error"] == "invalidFirstName") {
        echo "<p style='text-align: center; font-size: large;'> FirstName value is invalid!! </p>";

    } else if ($_GET["error"] == "invalidLastName") {
        echo "<p style='text-align: center; font-size: large;'> LastName value is invalid!! </p>";

    } else if ($_GET["error"] == "passwordMissMatch") {
        echo "<p style='text-align: center; font-size: large;'> Passwords do not match!! </p>";

    } else if ($_GET["error"] == "emailAlreadyExists") {
        echo "<p style='text-align: center; font-size: large;'> Email value is already in the database!! </p>";

    } else if ($_GET["error"] == "emptyCheckbox") {
        echo "<p style='text-align: center; font-size: large;'> Empty checkbox!! </p>";

    } else if ($_GET["error"] == "none") {
        echo"<p style='text-align: center; font-size: large;'> You have successfully signed up!! </p>";
        header("location: ../login.php");
    }
}
?>