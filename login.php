<?php
require 'conf.inc.php';
if(isset($_POST['sblogin']))
{
	if(!empty($_POST['username']) && isset($_POST['username']) && !empty($_POST['password']) && isset($_POST['password']))
	{
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$pass=md5($pass);         //encrypting password
	$stmt=$pd->prepare("Select scode,status,userid from regis where mail=? AND password=?");     //Getting status and userid
	$stmt->execute(Array($user,$pass));
		if($row=$stmt->fetch(PDO::FETCH_ASSOC))       //checking if such record exist or not
		{
			if($row['status']=='A')
			{
				session_start();
				$_SESSION['admin']="true";       //admin session variable
				$_SESSION['mail']="admin";
				header("Location:bikepanel.php");
			}
			else if($row['status']=='U')
			{
				session_start();
				$_SESSION['mm']=$user;
				$_SESSION['sc']=$row['scode'];
				header("Location:verify.php");
			}
			else
			{
			session_start();
			$_SESSION['userid']=$row['userid'];
			$_SESSION['mail']=$user;
			header("Location:index.php?stt=success");  //login successful
			}
		}
		else
		{
		header("Location:index.php?stt=invalid");    //Incorrect Email or password			
		}
	}
	else
	{
		header("Location:index.php?stt=empty");    //fields can be empty
	}
}
else
{
	header("Location:index.php?stt=accden");    //not authorized to access page
}
?>