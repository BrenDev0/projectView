<!DOCTYPE html>
<html lang="en">
<?php
// HTML head
require ('../require/templates/html_head.php')
?>
<body>
   <header class="header h-con va-center ha-end">
        <h1>ProjectView.</h1>
   </header>
   <main class="h-con ha-center va-center" id="signin-main">
      <form class="v-con va-center ha-center" method="post"  id="signin-form">
         <h2>Welcome Back!</h2>
         <?php
            if (isset($_SESSION['error'])){
               $error = $_SESSION['error'];
               echo "<p style='color: red'>$error</p>";
               unset($_SESSION['error']);
           }
         ?>
         <div class="form-elements v-con">
            <label for="name">Name</label>
            <input name="name" required type="text">
         </div>
         <div class="form-elements v-con">
            <label for="email">Email</label>
            <input name="email" required type="email">
         </div>
         <div class="form-elements v-con">
            <label for="password">Password</label>
            <input name="password" required type="password">
         </div>
         <button type="submit">Sign In</button>
         <span>Already have an account? <a href="signup.php#signup-form">Sign Up</a> </span>
      </form>
   </main> 
</body>
</html>