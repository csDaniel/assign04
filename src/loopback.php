<?php
  //header('Content-Type: application/json');
?>

<!doctype HTML>
<html>
  <head>
    <title>Loopback.php</title>
  </head>
  <body>
    <h2>The JSON Request:</h2>
    <?php
      echo "<div>";    
      
      $jsonArr = array();

      // store submission method
      $jsonArr["TYPE"] = $_SERVER['REQUEST_METHOD'];
      $jsonArr["parameters"] = null;
      // if POST, then add as post
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // print contents
        // add "parameters [nested array?]"
        foreach ($_POST as $key => $value) {
          $jsonArr["parameters"][$key] = $value;
        }  
      }
      // GET add parameters 
      elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        foreach ($_GET as $key => $value) {
          $jsonArr["parameters"][$key] = $value;
        }        
      }
      // encode array as json
      $jsonEncoded = json_encode($jsonArr);
      echo "<br>";
      // print off json type
      print_r($jsonEncoded);

      echo "</div>";
    ?>


  </body>
</html>