<?php
require 'conf.inc.php';
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']=="true")     //checking login
{
	header("Location:index.php?stt=unautho");
}
if(!isset($_GET['bkid']))
{
		header("Location:bikepanel.php?stat=choose");  //No bike choosen
}
if(isset($_POST['bksb']))       //if submit button is pressed
{
	$bkid=$_GET['bkid'];
	$bknm=$_POST['bknm'];  //Getting all the values in variables
	$desc=$_POST['desc'];
	$prc=$_POST['prc'];
	if(!($bknm=='' ||$desc=='' ||$prc==''))
	{
	if(getimagesize($_FILES['pic']['tmp_name'])==FALSE)
	{
		echo 'please select an image';      //No image found
	}
	else
	{
		$image=addslashes($_FILES['pic']['tmp_name']);      //getting image
		$image=file_get_contents($image);
		$image=base64_encode($image);
		savedata1($pd,$bknm,$desc,$prc,$image,$bkid);          //storing image with data
	}
	}
	else
	{
		echo 'please fill out required fields';
	}
}

function savedata1($pd,$bknm,$desc,$prc,$image,$bkid)       //storing bikes
{
	$stmt=$pd->prepare("update bikes set bkname=?,bkdesc=?,bkimg=?,bkprc=? where bkid=?");
	if($stmt->execute(array($bknm,$desc,$image,$prc,$bkid)))
	{
		header("Location:bikepanel.php?state=upds");  //updated successfully
	}
	else
	{
		header("Location:bikepanel.php?state=upderr");   //Error in updation
	}
}
?>