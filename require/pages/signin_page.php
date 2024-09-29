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
   <form method="post" action="index.php">
      <div class="form-elements">
         <label for="name">Name</label>
         <input name="name" required type="text">
      </div>
      <div class="form-elements">
         <label for="email">Email</label>
      </div>
      <div class="form-elements"></div>
   </form> 
</body>
</html>