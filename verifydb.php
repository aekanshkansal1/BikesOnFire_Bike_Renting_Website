<?php
	@require 'conf.inc.php';
	session_start();
	if(isset($_SESSION['mm']))
	{
		if($_POST['scd']==$_SESSION['sc'])
		{
		$stmt=$pd->prepare("Update regis set status=? where mail=?");     //Getting status and userid
			if($row=$stmt->execute(Array('V',$_SESSION['mm'])))
			{
				session_destroy();
				header("Location:index.php?stt=ver");    //setting status verified
			}
			else
			{
				echo 'Technical Error.Unable to Match Security';
			}
		}
		else
		{
			echo 'Security Code does not Match';
			echo '<a href="resend.php?mail='.$_SESSION['mm'].'">Resend Code</a>';  //resending code to mail
		}
	}
	else
	{
		header("Location:index.php?stt=unautho");
	}
?>