<?php
	require_once('includes/connection.inc.php');
	ini_set("display_errors","off");

	//If the form has been submitted, validate it.
	if(isset($_POST['submit'])){

		$dbc = dbConnect('local');

        $query= "DELETE FROM aliens_abduction WHERE id =".$_GET["id"];

    	if ($dbc->query($query) === TRUE) {
			header("location: select.php");
		} else {
    		echo "Error: " . $query . "<br>" . $mysqli->error;
		}

		$dbc->close();
	}
?>

<?php
    if(!isset($_POST['submit']))
	{
		$dbc = dbConnect('local');
		$query = "SELECT * FROM aliens_abduction WHERE id=".$_GET['id'];
		$result = $dbc->query($query);
		$row = $result->fetch_assoc();
		$dbc->close();
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<script src="scripts/jquery-1.8.2.min.js"></script>
	</head>
<body>

	<form method="post" action="delete.php?id=<?php echo $_GET['id'];?>">
    	<h1>Delete Contact</h1>
    	<p>Are you sure you want to delete this contact?</p>

		<?php
		//require_once('menu.php');
		?>

    	<p>First Name:<b> <?php echo $row['first_name'];?></b></p>
    	<p>Last Name: <b><?php echo $row['last_name'];?></b></p>
    	<p>When it happened: <b><?php echo $row['when_it_happened'];?></b></p>
    	<p>Alien description: <b><?php echo $row['alien_description'];?></b></p>
    	<p>What they did: <b><?php echo $row['what_they_did'];?></b></p>
    	<p>Fang spotted: <b><?php echo $row['fang_spotted'];?></b></p>
    	<p>Email: <b><?php echo $row['email'];?></b></p>
    	<input type="submit" name="submit" value="Yes, Delete" />
    </form>
</body>
</html>
