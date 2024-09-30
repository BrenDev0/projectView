<!DOCTYPE html>
<html lang="en">
<?php
// HTML head 
include ('../private/include/partials/html_head.php')
?>
<body id="signup-body">
    <?php
    include '../private/include/partials/dt_header.php'
    ?>
    <main id="signup-main">
        <div class="h-con ha-center va-center" id="demo">
            <p id="demo-p">Demo Video w/ description</p>
        </div>
        <form method="post" action="signin.php" class="v-con va-center ha-center full" id="mobile-landing">
            <a class="h-con ha-center va-center" href="#signup-form">Sign Up</a>
            <button type="submit">Sign In</button>
        </form>
        <form method="post"></form>
        <div class="h-con ha-center va-center full" id="signup-form-con">
            <?php
            // Signup form 
            include '../private/include/partials/signup_form.php'
            ?>  
        </div>
    </main>
</body>
</html>



