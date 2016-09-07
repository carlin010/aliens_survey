<?php
ini_set("display_errors","on");
require_once('includes/connection.inc.php');

$selected = $_REQUEST["id"];
echo $selected;
$dbc = dbConnect('local');
$sql = "select * from aliens_abduction where id = '" . $_GET['id'] . "'";
$result = $dbc->query($sql);
while ($row = $result->fetch_assoc())
{
	$firstname=$row["first_name"];
	$lastname=$row["last_name"];
	$whenhappen=$row["when_it_happened"];
	$howlong=$row["how_long"];
	$howmany=$row["how_many"];
	$desc=$row["alien_description"];
	$whattheydid=$row["what_they_did"];
	$fangspotted=$row["fang_spotted"];
	$othr=$row["other"];
	$email=$row["email"];
}
?>
<?php
	if(isset($_POST["submit"]))
	{
		$query="UPDATE aliens_abduction SET first_name='".$_POST["firstname"]."',last_name='".$_POST["lastname"]."',when_it_happened='".$_POST[										"whenithappened"]."',how_long='".$_POST["howlong"]."',how_many='".$_POST["howmany"]."',alien_description='".$_POST["aliendescription"]."',what_they_did='".$_POST["whattheydid"]."',fang_spotted='".$_POST["fangspotted"]."',other='".str_replace("'","''",$_POST["other"])."',email='".$_POST["email"]."' WHERE id=".$_REQUEST["id"];

		if ($dbc->query($query) === TRUE) {
		    header("location: select.php");
		} else {
    		echo "Error: " . $query . "<br>" . $mysqli->error;
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Aliens Abducted Me - Report an Abduction</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/styles.css" />
<script src="scripts/jquery-1.8.2.min.js"></script>

<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<section>

<div id="section_articleOneIdentifier" class="sectionOne" /></div>
<article id="article_one" style="position: absolute; left: 420px; top: 10px; width: 315px; height: 550px; z-index: 2">


<form method="POST" action="edit.php?id=<?php echo $_REQUEST["id"]?>">
<h1>Aliens Abducted Me - </h1>
<p>Report an Abduction, contact us:</p>
<label>First Name: </label><br>
<input name= "firstname" type="text" placeholder=" First Name" value="<?php echo $firstname;?>"> <br><br>

<label>Middle Name: </label><br>
<input name="MiddleName" type="text" disabled><- disabled <br><br>

<label>Last Name: </label><br>
<input name="lastname" type="text" maxlength="25" required placeholder=" Last Name" value="<?php echo $lastname;?>"> <br><br>

<label>Email: </label><br>
<input name="email" type="email" required placeholder=" Email" value="<?php echo $email;?>"><br><br>

<label>When did it happen?</label><br>
<input name="whenithappened" type="text" placeholder=" When dit it happen?" value="<?php echo $whenhappen;?>"><br><br>

<label>How long were you gone?</label><br>
<input name="howlong" type="text" placeholder=" How long were you gone?" value="<?php echo $howlong;?>"/><br><br>

<label>How many did you see?</label><br>
<input name="howmany" type="text" placeholder=" How many did you see?" value="<?php echo $howmany;?>"/><br><br>

<label for="aliendescription">Describe them:</label><br>
<input type="text" name="aliendescription" size="32" placeholder=" Describe them" value="<?php echo $desc;?>" /><br><br>

<label for="whattheydid">What did they do to you?</label><br>
<input type="text" name="whattheydid" size="32" placeholder=" What did they do to you?" value="<?php echo $whattheydid;?>" /><br><br>

<label>Have you seen my dog Fang?</label><br>
Yes <input name="fangspotted" type="radio" value="yes" <?php if($fangspotted=="yes") echo " checked";?> />
No <input name="fangspotted" type="radio" value="no" <?php if($fangspotted=="no") echo " checked";?> /><br><br>
<img src="fang.jpg" width="100" height="175"
alt="My abducted dog Fang." /><br><br>

<label for="other">Anything else you want to add?</label>
<textarea name="other" placeholder="Anything else you want to add?"   ><?php echo $othr;?></textarea><br><br>

<input type="submit" name="submit" value="Submit">
</form>
</article>
</section>

<!-- <footer id="footer" class="footerStyle" style="">
<hr class="HRstyle" />
<p class="Copyright">Copyright � 2013 Aliens Anonymous</p>
</footer> -->

</body>
</html>
