<?php
  session_start();
  if (!($_SESSION['username'])) {
    header('Location: login.php?action=noLogin');
    exit();
    } else { 
?>

<!doctype HTML>

<html>
  <head>
    <title> PHP Login: Content 2</title>
  </head>
  <body>
    <?php
        echo "<h2><center>Page 2</center></h2>";
        $content1 = $_SESSION['content1'];
        echo "<div>";
        echo "Welcome to page 2, ".$_SESSION['username'].". </br>";
        echo "</br><a href = '$content1'>Click here to return to content 1.</a>";
        echo "</div>";
      }
    ?>
  </body>
</html>