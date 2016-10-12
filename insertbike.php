<?php
@require 'conf.inc.php';
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']=="true")
{
	header("Location:index.php?stt=invalid");
}
if(isset($_POST['bksb']))       //if submit button is pressed
{
	$bkname=$_POST['bknm'];  //Getting all the values in variables
	$bkdesc=$_POST['desc'];
	$bkprc=$_POST['prc'];
	if(!($bkname=='' ||$bkdesc=='' ||$bkprc==''))
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
		savedata($pd,$bkname,$bkdesc,$bkprc,$image);          //storing image with data
	}
	}
	else
	{
		echo 'please fill out required fields';
	}
}

function savedata($pd,$bkname,$bkdesc,$bkprc,$image)       //storing bikes
{
	$stmt=$pd->prepare("Insert into bikes values(?,?,?,?,?,?,?)");
	if($no=$stmt->execute(array('',$bkname,$bkdesc,$image,'','A',$bkprc)))
	{
		header("Location:bikepanel.php?state=ins");  //register successfully
	}
	else
	{
		header("Location:bikepanel.php?state=err");   //error in registering
	}
}
?>