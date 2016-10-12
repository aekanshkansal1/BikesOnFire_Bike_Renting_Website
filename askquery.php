<?php
session_start();
if(isset($_SESSION['mail']))
{
if((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['mess']) && !empty($_POST['mess'])))
{
if(isset($_POST['ph']) && !empty($_POST['ph']) && strlen($_POST['ph'])==10)
{
	$message=$_POST['mess']."\nSender Contact no:".$_POST['ph']."\nSender name:".$_POST['name'];
	if(mail("ceo@bikesonfire.com","Query",$message,$_SESSION['mail']) /*&& mail("complaints@bikesonfire.com","Query",$message,$_SESSION['mail'])*/ && mail("apsoss@gmail.com.com","Query",$message,$_SESSION['mail']))
	{
	header("Location:contact.php?status=sucq");		
	}
	else
	{
	header("Location:contact.php?status=failq");				
	}

}
else
{
	header("Location:contact.php?status=unvalid");
}
}
else
{
	header("Location:contact.php?status=unvalid");
}
}
else
{
	header("Location:index.php?unautho");
}
?>