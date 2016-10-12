<?php
@require 'conf.inc.php';
	session_start();
if(isset($_POST['sb']) && isset($_SESSION['mail']))
{
	$user=$_SESSION['userid'];
	$bkid=$_SESSION['bkids'];
	if(isset($_POST['numday']) && !empty($_POST['numday']) && isset($_POST['dt']) && !empty($_POST['dt']))
	{
		try
		{
		$dt= date('Y-m-d', strtotime($_POST['dt']));
		$c_date = date ("Y-m-d");
		if(strtotime($dt)<strtotime($c_date)) 			//Additional precautions no need 
		Header("Location:bikedesc.php?st=bckdt");  //booking in back date			
		}
		catch(Exception $ex)
		{
			Header("Location:bikedesc.php?st=bckdt");  //booking in back date			
		}
					$stmt=$pd->prepare("Insert into booking values(?,?,?,?,?,?,?,?)");
						if($no=$stmt->execute(array('',$user,$bkid,$dt,$c_date,$_POST['numday'],'','Unconfirm')))
						{
							$stmt2=$pd->prepare("select bkname,bkprc from bikes where bkid=?");
							$stmt2->execute(Array($bkid));
							$row=$stmt2->fetch(PDO::FETCH_ASSOC);
							$message="Bike Booked by:".$_SESSION['mail']."\nBike name:".$row['bkname']."\nPickup date:".$dt."\nDays:".$_POST['numday']."\nPrice/day:".$row['bkprc']." Rs";
//							mail("ceo@bikesonfire.com","Bike Booked",$message,$_SESSION['mail']);
							mail("booking@bikesonfire.com","Bike Booked",$message,$_SESSION['mail']);
							mail("apsoss@gmail.com.com","Bike Booked",$message,$_SESSION['mail']);
							header("Location:bikedesc.php?st=book");  //Booked successfully
						}
						else
						{
							header("Location:register.php?st=err");   //error in Booking
						}

	}
	else
	{
		header("Location:bikedesc.php?st=incomp");  //incomplete fields 
	}
}
else
{
	header("location:index.php?stt=unautho"); //unauthorized access
}
?>