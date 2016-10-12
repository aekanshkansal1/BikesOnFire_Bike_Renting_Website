<?php
@require 'conf.inc.php';
session_start();
if(isset($_SESSION['mail']))
{
	$stmt=$pd->prepare("Select ph,addl1,addl2,pin from regis where mail=?");     //Getting status and userid
	$stmt->execute(Array($_SESSION['mail']));
	if($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{

?>
<html>
<head>
<script>
function validps()
{
	if(is_empp())  //any field empty
	{
		alert("All fields are mandatory");
	}	
	else if(document.getElementById("newpass").value.length<6)
	{
		alert("Insufficient Password");
	}
	else if(document.getElementById("newpass").value!=document.getElementsByName("confirm")[0].value)
	{
		alert("Password donot match");
	}
	else
	{
		document.pform.submit();
	}
}

function validupd()
{
	if(is_empu())  //any field empty
	{
		alert("All fields are mandatory");
	}	
	else if(document.getElementById("phn").value.length<10 || isNaN(document.getElementById("phn").value) || document.getElementById("phn").value.substring(0,1)<7)
	{
		alert("Invalid Phone number");
	}
	else if(document.getElementById("pc").value.length<6 || isNaN(document.getElementById("pc").value))
	{
		alert("Invalid pin code");
	}
	else if(document.getElementById("ad2").value.length<4)
	{
		alert("Invalid Address");
	}
	else
	{
		document.uform.submit();
	}
}
function is_empu()
{
//	for(i=3;i<=7;i++)
	for(i=0;i<=3;i++)
	{
		if(document.getElementsByTagName("input")[i].value=="")
		{
			return true;  //fields are empty
		}
	}
}
function is_empp()
{
	for(i=0;i<=2;i++)
	{
		if(document.getElementsByTagName("input")[i].value=="")
		{
			return true;  //fields are empty
		}
	}
}
</script>

<!--CSS-->
 <!-- Bootstrap core CSS -->
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/header.css" rel="stylesheet">

	<link type="text/css" href="css/footer.css" rel="stylesheet">
<!--	<link type="text/css" href="css/footercorrection.css" rel="stylesheet">-->
	<link type="text/css" href="css/account.css" rel="stylesheet">
    <title>BikesOnFire</title>

</head>
<body>
	<?php

if(isset($_SESSION['mail']))
{
	//show a diffent header
	@include 'header_logged.php';
}
else
{
	@include 'header_ini.php';
}
?>

<div class="container">
<div id="details">
<!--<form action="update_pass.php" method="POST" name="pform" id="pform">
<table>
<tr><td style="color:#ffffff">Password</td><td><input type="password" name="pass" id="pass" maxlength="50"></td></tr>
<tr><td style="color:#ffffff">New Password</td><td><input type="password" name="newpass" id="newpass" maxlength="50"></td></tr>
<tr><td style="color:#ffffff">Confirm password</td><td><input type="password" name="confirm" id="confirm" maxlength="50"></td></tr> 
</table>
<input type="button" onclick="validps()" value="Change Password" name="cp" id="submitbtn"/>
</form>-->
<form action="update_set.php" method="POST" name="uform" id="uform">
<table>
<tr><td style="color:#ffffff">Phone</td><td><input type="text" name="phn" id="phn" value="<?php echo $row['ph']?>" maxlength="10"></td></tr> 
<tr><td style="color:#ffffff">Address Line1</td><td><input type="text" name="ad1" id="ad1" maxlength="80" value="<?php echo $row['addl1']?>" placeholder="Flat No/Street"></td></tr>
<tr><td style="color:#ffffff">Address Line2</td><td><input type="text" name="ad2" id="ad2" maxlength="80" value="<?php echo $row['addl2']?>" placeholder="City/State"></td></tr>
<tr><td style="color:#ffffff">Pincode</td><td><input type="text" name="pc" id="pc" maxlength="6" value="<?php echo $row['pin']?>"></td></tr>
</table>
<input type="button" onclick="validupd()" value="Update" name="sb" id="submitbtn"/>
</form>
</div>
</div>

<?php
  @include 'footer.php';
	?>


<!-- Bootstrap core JavaScript
    ================================================== -->

	<!-- Placed at the end of the document so the pages load faster -->
	  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <!--<script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script> -->  
	  <script src="js/social.js"></script>
</body>
</html>
<?php
	}
}
else
{
	header("Location:index.php?stt=unautho");  //not authorized ...Not required really
}
?>