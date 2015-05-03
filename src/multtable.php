<?php
/* *************************************************************
* PHP 
* 
* Name: 								Daniel Ofarrell
* Filename:								phpPrint
* Date Created:							30 April 2015
* Last Modification Date:				30 April 2015
*
* Description:
*	Will produce a table from information gained from assign04.html (in testing)
* Input:
*	Checks if min < max in both multiplicand and multipliers
*	Also checks if all 4 values are numbers
* Output:
*	Produces a multiplication table of all values. For example:
*	  1 2 3
*	2 2 4 6
*	3 3 6 9	
*
* ************************************************************* */
?>

<!DOCTYPE html>
<html>
	<head><title> Multiplication Table </title>
	</head>
	<body>

<?php

	// assign values sent from html form
	$minMultiplicand = $_GET["min-multiplicand"];
	$maxMultiplicand = $_GET["max-multiplicand"];
	$minMultiplier = $_GET["min-multiplier"];
	$maxMultiplier = $_GET["max-multiplier"];
	
	$inputErrorCand = false;
	$inputErrorIer = false;
	
	// checks return address and removes current page
	$returnAddress = explode( '/', $_SERVER['PHP_SELF'], -1);
	$returnAddress = implode('/', $returnAddress);
	$returnAddress .= "/assign04.html";

	
	// error handling on input
	if ($minMultiplicand > $maxMultiplicand) {
		$inputErrorCand = true;
		echo "<br>Minimum multiplicand larger than maximum. <br>";
		echo "<a href=' ".$returnAddress." '>Click here to try again</a> <br>";
	}
	if ($minMultiplier > $maxMultiplier) {
		$inputErrorIer = true;
		echo "<br>Minimum multiplier larger than maximum. <br>";
		echo "<a href=' ".$returnAddress." '>Click here to try again</a> <br>";
	}
	
	// checks if input values are numeric values
	// (could be shorter if written as an array?)
	if ($minMultiplicand && $minMultiplier && $maxMultiplicand && $maxMultiplier) {
		if (!is_numeric($minMultiplier)) {
			$inputErrorIer = true;
			notInt($minMultiplier, $returnAddress);
		}
		if (!is_numeric($minMultiplicand)) {
			$inputErrorCan = true;
			notInt($minMultiplicand, $returnAddress);
		}
		if (!is_numeric($maxMultiplicand)) {
			$inputErrorCan = true;
			notInt($maxMultiplicand, $returnAddress);
		}
		if (!is_numeric($maxMultiplier)) {
			$inputErrorIer = true;
			notInt($maxMultiplier, $returnAddress);
		}
	}
	
	//not int output
	function notInt(&$invalidInput, $returnAddressnotInt){		
		echo "<br>I'm sorry, but $invalidInput is not an integer. <br>";
		echo "<a href=' ".$returnAddressnotInt." '>Click here to try again</a> <br>";		
	}
	
	//test for input!
	if (!$minMultiplicand) {
		$inputErrorCand = true;
		echo "Missing parameter min-multiplicand <br>";	
	}
	if (!$maxMultiplicand) {
		$inputErrorCand = true;
		echo "Missing parameter max-multiplicand <br>";	
	}	
	if (!$minMultiplier) {
		$inputErrorIer = true;
		echo "Missing parameter min-multiplier<br>";	
	}	
	if (!$maxMultiplier) {
		$inputErrorIer = true;
		echo "Missing parameter max-multiplier<br>";	
	}
	
	if (!$inputErrorIer && !$inputErrorCand) {
		echo "<table border=\"2\">";
		echo "<td></td>";
		// print the multiplipliers
		for ($top = $minMultiplier; $top < ($maxMultiplier + 1); $top++) {
			echo '<td>' .$top. '</td>';
		}
		echo '<tr>';
		// print table data
		for ($col = $minMultiplicand; $col < ($maxMultiplicand + 1); $col++) {	
			// print multiplicant
			echo '<td>' .$col. '</td>';
			// print table
			for ($row = $minMultiplier; $row < ($maxMultiplier + 1); $row++) {	
				echo '<td>' .$row*$col. '</td>';
			}
			echo "<tr>";		
		}
		echo "</table>";
	} 
?>
	</body>
</html>

