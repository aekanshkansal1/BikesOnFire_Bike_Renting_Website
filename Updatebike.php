<?php
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']=="true")     //checking login
{
	header("Location:index.php?stt=unautho");
}
if(!isset($_GET['bkid']))
{
		header("Location:bikepanel.php?stat=choose");  //No bike choosen
}
else
{
	$bkid=$_GET['bkid'];		
	@require 'conf.inc.php';
    $stmt=$pd->prepare("select bkname,bkdesc,bkimg,bkprc from bikes where bkid=?");
    $stmt->bindParam('1',$bkid);
    $stmt->execute();
    if($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
?>
<html>
<head>
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/header.css" rel="stylesheet">
</head>
<body>
<pre>
<!--<a href="modifybike.php">Modify Bikes</a>  OTHER OPERATIONS--> 
<form action="updateinf.php?bkid=<?php echo $_GET['bkid'];?>" method="POST" enctype="multipart/form-data">
	Bike Name<input type="text" name="bknm" value="<?php echo $row['bkname'];?>" required><br/>
	Bike Description<textarea name="desc" rows="6" cols="50" required><?php echo $row['bkdesc'];?></textarea><br/>
	Bike Price<input type="number" min="0" name="prc" value="<?php echo $row['bkprc'];?>" required><br/>
	<?php echo '<img src="data:image;base64,'.$row['bkimg'].'"/>'; ?>
	Change Image(Best size 250*250)<input type="file" name="pic"><br/>
	<input type="submit" value="submit" name="bksb">
</pre>
<?php
}
else
{
	echo "Error Unable To find preview.";
}
}
?>
</form>
</body>
</html>
