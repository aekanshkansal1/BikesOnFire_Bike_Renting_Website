<?php
@require 'conf.inc.php';
session_start();
if(isset($_SESSION['mail']))
{
	if(isset($_POST['phn']) && !empty($_POST['phn']) && strlen($_POST['phn'])==10)
	{
		if(isset($_POST['ad1']) && !empty($_POST['ad1']) && isset($_POST['ad1']) && !empty($_POST['ad1']) && isset($_POST['pc']) && !empty($_POST['pc']))
		{
			$phn=$_POST['phn'];
			$pc=$_POST['pc'];
			$ad1=$_POST['ad1'];
			$ad2=$_POST['ad2'];
			if(strlen($phn)==10 && (substr($phn,0,1)=="9" || substr($phn,0,1)=="8" || substr($phn,0,1)=="7") && is_numeric($phn))
			{
				if(strlen($pc)==6)
				{
					$stmt=$pd->prepare("Update regis set ph=?,addl1=?,addl2=?,pin=? where userid=?");
				    if($stmt->execute(array($phn,$ad1,$ad2,$pc,$_SESSION['userid'])))
					header("Location:account_set.php?upd=succ");
					else
					header("Location:account_set.php?upd=fail");				    	
				}
				else
					header("Location:account_set.php?upd=invpc");
			}
			else
				header("Location:account_set.php?upd=invphn");
		}
		else
			header("Location:account_set.php?upd=accden");
	}
	else
		header("Location:account_set.php?upd=accden");
}
?>