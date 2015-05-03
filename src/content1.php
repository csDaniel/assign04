<?php
  session_start();
  if (!isset($_REQUEST['username']) && !isset($_SESSION['username'])) {
    header('Location: login.php?action=noLogin');
    exit();
    } else {

?>

<!doctype HTML>
<html>
  <head>
  </head>
  <body>
    <?php
    	// checks return address and removes current page
      $returnAddress = explode( '/', $_SERVER['PHP_SELF'], -1);
      $returnAddress = implode('/', $returnAddress);
      $returnAddress = $_SERVER['HTTP_HOST'] . $returnAddress;
      $content1 = "http://" . $returnAddress . "/content1.php";
      $content2 = "http://" . $returnAddress . "/content2.php";
      $login = "http://" . $returnAddress . "/login.php";
    
      $return = false;
      $loggedin = false;
      
      echo "<div>";
      // check if login occurs
      // change rewquest to post
      if (isset($_REQUEST['username'])) {
        // check if person logging in is new
        if (isset($_SESSION['username']) && $_SESSION['username'] != $_REQUEST['username']) {
          echo "Can't log you in because ".$_SESSION['username']." is currently logged in.<br/>";
          $return = true;
          
        // username is the same as previous session
        } elseif (isset($_SESSION['username'])) {
          $loggedin = true;
          $_SESSION['pagevisit'] += 1;
        
        } elseif (empty($_REQUEST['username'])) {
          echo "A username must be entered. </br>";
          $return = true;        
         
        // username is a new user in a new session          
        } else {
          $_SESSION['username'] = $_REQUEST['username'];
          $_SESSION['pagevisit'] = 0;
          $loggedin = true;
        }
      } elseif (isset($_SESSION['username'])) {
        // returning user
          $loggedin = true;
          $_SESSION['pagevisit']++;
      } else {
        // username is blank
        echo "You must enter a username. </br>";
        $return = true;
      }
      echo "</div>";
      
      echo "<div>";      
      // return to login option. 
      if ($return) {
        echo "Click <a href='$login'>here</a> to return and try again </br>";  
      }
      
      // is logged in information
      // Hello [username] you have visited this page [n] times before. Click here to logout
      if ($loggedin) {
        $_SESSION['content1'] = $content1;
          echo "Hello ".$_SESSION['username'].", you have visited this page ".$_SESSION['pagevisit'].
            " times before. </br>";
        echo "<a href = '$content2'>Click here to visit content2.php</a>";
        echo "</div>";
        
        // log out option 
        echo "<div>";
        echo "<br><a href = \" $login?action=logout \" >Click here to log out</a></br>";
        echo "</div>";
      }
    }
    ?>
  </body>
</html>