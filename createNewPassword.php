<link rel="stylesheet" href="css/styles.css" />

<!-- reset-password form starts -->

<div class="login-form">
    <div id="close-login-btn" class="fas fa-times"></div>
    <?php
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
    } else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
            <form action="includes/resetRequest.inc.php" method="post">


                <h3> Enter new password </h3>

                <input type="hidden" class="box" name="selector" value="<?php echo $selector; ?>" />
                <input type="hidden" class="box" name="validator" value="<?php echo $validator; ?>" />
                <input type="password" class="box" name="pwd" placeholder="Enter new password..."/>
                <input type="password" class="box" name="pwd-repeat" placeholder="Repeat new password..."/>
                <button type="submit" name="resetPasswordSubmit" class="btn">Reset Password</button>
            </form>

            <?php
        }
    }
    ?>

</div>