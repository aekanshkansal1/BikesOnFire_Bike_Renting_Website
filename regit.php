<?php
@require 'conf.inc.php';
  //getting all the fields
		$nm=$_POST['nm']; 
		$pass=$_POST['pass'];
		$confirm=$_POST['confirm'];
		$mail=$_POST['mail']; 
		$ad1=$_POST['ad1']; 
		$ad2=$_POST['ad2'];
		$pc=$_POST['pc'];
		$phn=$_POST['phn'];
		//Checking Any field is empty 
		if(!empty($nm) && !empty($pass) && !empty($confirm) && !empty($mail) && !empty($ad1) && !empty($ad2) && !empty($pc) && !empty($phn))
		{
			//checking length of imp fields
			if(strlen($phn)==10 && strlen($pc)==6 && strlen($pass)>5)
			{
				if($confirm==$pass)  //checking password are same
				{
					if((substr($phn,0,1)=="9" || substr($phn,0,1)=="8" || substr($phn,0,1)=="7") && is_numeric($phn))  
					{
			//filter_var function gives false when the validation fails and the value of field when it doesn't.
						if (filter_var($mail,FILTER_VALIDATE_EMAIL))  //mail validation
						{
							$uid=generate_id($pd);
							check_mail($mail,$pd);
							$scode=generate_code();
							//database storage
						$stmt=$pd->prepare("Insert into regis values(?,?,?,?,?,?,?,?,?,?)");
						$pass=md5($pass);  //changing to md5
						if($no=$stmt->execute(array($uid,$pass,$nm,$phn,$mail,$ad1,$ad2,$pc,$scode,'U')))
						{
							sendmail($scode,$mail);
							header("Location:index.php?stt=verstep");  //register successfully
						}
						else
						{
							header("Location:register.php?st=err");   //error in registering
						}
						}
						else
						{
							header("Location:register.php?st=mail");       //Invalid Mail id
						}
					}
					else
					{
						header("Location:register.php?st=phone");    //Invalid phone number'
					}
				}
				else
				{
					header("Location:register.php?st=nmatch");   //password not match
				}	
			}
			else
			{
				header("Location:register.php?st=inapp");         //Inappropriate length
			}
		}
		else
		{
			header("Location:register.php?st=fill");              //All fields are mandatory
		}
function generate_id($pd)
{
	//generating use id
	$slct=$pd->prepare("Select max(userid) as userid from regis");
	$slct->execute();
	if($row=$slct->fetch(PDO::FETCH_ASSOC)) //returns an array in row
	//or use if(count($row)>1)
	{
		return ($row['userid']+1);
	}
	else
	{
		return 1;
	}
}
function check_mail($check,$pd)  //check if mail is already used
{
	$stmt=$pd->prepare("Select userid from regis where mail=?");
	$stmt->execute(array($check));
	if($row=$stmt->fetch(PDO::FETCH_ASSOC))
		header("Location:register.php?st=dupmail");
}
function generate_code()
{
	return rand(1,999999);      //six dit random number
}
function sendmail($scode,$sendto)
{
 // Email information
  $from = "noreply@bikesonfire.com";
  $subject = "Email Verification";
  $message = "Hey
Thanks for registering on BikesOnFire.com .Your security code is $scode. Please login again and enter this security code. Enjoy Riding!!!
Regards,
Team BikesOnFire";
  //send email
  mail($sendto,$subject,$message,"From:".$from);
}
?>