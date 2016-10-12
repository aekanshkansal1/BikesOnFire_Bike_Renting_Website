<!--Remaining Giving Style and showing status at right place-->
<?php
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']=="true")     //checking login
{
	header("Location:index.php?stt=unautho");
}
if(isset($_GET['state']))   //Checking status of previous insertion
{
	if($_GET['state']=="ins")
	{
		echo 'Bike Uploaded Successfully';
	}
	else if($_GET['state']=="noind")
	{
		echo 'No index Found';
	}
	else if($_GET['state']=="upds")
	{
		echo 'Bike Updated Successfully';
	}
	else if($_GET['state']=="err")
	{
		echo 'Error in Uploading Bike';
	}
	else if($_GET['state']=="upderr")
	{
		echo 'Error in Updating Bike';
	}
	else if($_GET['state']=="del")
	{
		echo 'Bike successfully deleted';
	}
	else if($_GET['state']=="nf")
	{
		echo 'Bike Not Found';
	}
	else if($_GET['state']=="choose")
	{
		echo 'No Bike Choosen';
	}
	else
	{

	}
}
?>
<html>
<head>
    <title>BikesOnFire</title>
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/header.css" rel="stylesheet">
</head>
<body>
<pre>
<a href="logout.php">Logout</a>
<!--<a href="query.php">View query</a>-->
<!--<a href="orders.php?bookindex=1">View Orders</a>-->
<a href="modifybike.php?type=Delete">Delete Bikes</a>
<a href="modifybike.php?type=Update">Update Bikes</a>
<a href="bikelist.php">View Bikes</a>
<form action="insertbike.php" method="POST" enctype="multipart/form-data">
	Bike Name<input type="text" name="bknm" required><br/>
	Bike Description<textarea name="desc" rows="6" cols="50" required></textarea><br/>
	Bike Price<input type="number" min="0" name="prc" required><br/>
	Image(Best size 250*250)<input type="file" name="pic" required><br/>
	<input type="submit" value="submit" name="bksb">
</pre>
</form>
</body>
</html>