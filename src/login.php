<?php
  session_start();
 ?>

<!doctype HTML>
<html>
  <head>
    <title>Login Page</title>
  </head>
  <body>
    <?php
      // log out verification
      echo "<div>";
      if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        // unset() removes session variables, destroy deletes session
        unset($_SESSION);  
        session_destroy();
        echo "Successfully Logged out!";          
        }
      echo "</div>";
      // user attempts to access content1 or content2 without logging
      if (isset($_GET['action']) && $_GET['action'] == 'noLogin') {
        echo '<script language = "javascript">';
        echo 'alert("You must log in first")';
        echo '</script>';        
      }
      
    ?>
    <div>
      <center><h2>Enter Login Info Here</h2>
      <form action="content1.php" method="post">
        Username:<input type="text" name="username">
        <input type="submit" value="Login">
      </form>
      </center>
    </div>
  </body>
</html>