<!DOCTYPE html>
<html lang="en">
<?php
// HTML head 
require ('../require/templates/html_head.php')
?>
<body id="signup-body">
    <header class="header h-con va-center ha-end">
        <h1>ProjectView.</h1>
    </header>
    <main id="signup-main">
        <div class="h-con ha-center va-center" id="demo">
            <p id="demo-p">Demo Video w/ description</p>
        </div>
        <form method="post" class="v-con va-center ha-center full" id="mobile-landing">
            <input type="submit" value="Sign Up">
            <input type="button" value="Sign In">
        </form>
        <form method="post"></form>
        <div class="h-con ha-center va-center full" id="signup-form-con">
            <?php
                // Signup form 
                require ('../require/templates/signup_form.php')
            ?>  
        </div>
    </main>
</body>
</html>



