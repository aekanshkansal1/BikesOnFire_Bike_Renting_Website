<?php
if(isset($_GET['bkid']))
{
	$bkid=$_GET['bkid'];
	@require 'conf.inc.php';
	$stmt=$pd->prepare("delete from bikes where bkid=?");     //Getting status and userid
	$stmt->execute(Array($bkid));
	if($stmt->rowCount())       //checking if such record exist or not
	{
		header("Location:bikepanel.php?stat=del");   //bike deleted
	}
	else
	{
		header("Location:bikepanel.php?state=nf");   //bike not found
	}
}
else
{
	header("Location:bikepanel.php?state=choose");  //No bike choosen
}
?>