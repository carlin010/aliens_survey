<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8">
		<title>Aliens Abducted Me - Report an Abduction</title>
	</head>

<body>
	<h2>SUCCESS!!! - Open phpMyAdmin and check that the data has been added</h2>

	<?php

		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$when_it_happened = $_POST['whenithappened'];
		$how_long = $_POST['howlong'];
		$how_many = $_POST['howmany'];
		$alien_description = $_POST['aliendescription'];
		$what_they_did = $_POST['whattheydid'];
		$fang_spotted = $_POST['fangspotted'];
		$email = $_POST['email'];
		$other = $_POST['other'];

/* Write the lines of code below which will provide the response
   once the form has been submitted */

	   $dbc = mysqli_connect('localhost', 'root', '', 'db_aliens')
	     //$dbc = new mysqli('pendragon.gannon.edu', 'smith03', 'Id#7654321', 'db_smith003')
		  or die('Error connecting to MySQL server.');

/*
		$query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long, " .
		    	 "how_many, alien_description, what_they_did, fang_spotted, other, email) " .
				 "VALUES ('$first_name', '$last_name', '$when_it_happened', '$how_long', '$how_many', " .
				 "'$alien_description', '$what_they_did', '$fang_spotted', '$other', '$email')";
*/
		$query =  "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long,";
		$query .= "how_many, alien_description, what_they_did, fang_spotted, other, email)";

		$query .= "VALUES ('$first_name', '$last_name', '$when_it_happened', '$how_long', '$how_many',";
		$query .= "'$alien_description', '$what_they_did', '$fang_spotted', '$other', '$email')";

		//$result = mysqli_query($dbc, $query)
		$result = $dbc->query($query)
          or die('Error querying database.');


		//mysqli_close($dbc);
		  $dbc->close();
?>

</body>
</html>
