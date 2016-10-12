<html>
<head>
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/regstyle.css">
<link rel="icon" href="img/favicon.ico">
<title>BikesOnFire</title>
<script>
	function valid()
	{
		var i,flag=false;
		var a=["nm","mail","pass","confirm","phn","ad1","ad2","pc"];
		for(i=0;i<a.length;i++)
		{
			if(document.getElementById(a[i]).innerHTML.substring(52,59)=="Invalid" || document.getElementsByTagName("input")[i].value=="")
			{
				alert("Please correct all the fields");
				flag=true;
				break;
			}
		}
		if(!flag)
		document.rform.submit();
	}
	function validate(field,query,query2)
	{
		var xmlhttp;
		if(window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				var resp=xmlhttp.responseText;
				if(!(resp.substring(0,7)=="Invalid"))
				{
					document.getElementById(field).innerHTML="<img style='border-radius:100%' width='25px' height='25px' src='img/right.png'>Correct";
				}
				else
				{
					document.getElementById(field).innerHTML="<img style='border-radius:100%' width='25px' height='25px' src='img/wrong.png'>"+resp;
				}
			}
		}
		xmlhttp.open("GET","validregis.php?field="+field+"&val1="+query+"&val2="+query2,true);
		xmlhttp.send();
	}
</script>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['mail']))  //if login then don't allow to register
{
	//show a diffent header
	header("Location:index.php?stt=alreg");
}
else
{
//	include 'header_ini.php';
}
?>
<!--Header 
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
	    <div class="navbar-header">
		  <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#navigator">
		    <span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			
		  </button>
		  </div>
		  <div class="header">
		  <a class="navbar-brand" href="#"><img src="img/l.png"> </a>
		
		
		<div class="collapse navbar-collapse" id="navigator">
		  <ul class="nav navbar-nav">
		    <li><a href="#" class="link">Home</a></li>
			<li><a href="#" class="link">Shop</a></li>
			<li><a href="#" class="link">Rent</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <li><a href="register.php" class="link overlayLink"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
			<li><a href="" class="link overlayLink1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
		</div>
	  
	  
	  </div>
	</nav>
	-->
	
<div class="register">
<div class="container">
<div class="formwrapper">
<div id="error"><?php   //Give the status  
//To do Display propery
if(isset($_GET['st']))
{
	$st=$_GET['st'];
	if($st=="dupmail")  //duplicate mail id
		echo "Email id already exist";
	else if($st="err")
		echo "Registration Error.Let us know contact Admin.";
	else if($st="mail")
		echo "Invalid mail id";
	else if($st="phone")
		echo "Invalid Phone Number";
	else if($st="nmatch")
		echo "Invalid Password don't match";
	else if($st="inapp")
		echo "Invalid field length";
	else if($st="fill")
		echo "Invalid fill all fields";
	else
	{

	}

}
?>
</div>
<form action="regit.php" method="POST" name="rform">
<div id="contents">
<table>
<tr>
<td><div class="descrip">Name</div></td><td><input type="text" name="nm" maxlength="50" onblur="validate('nm',this.value,'')" class="field"></td></tr><tr class="vld"><td></td><td id="nm"></td></tr>
<tr><td><div class="descrip">E-mail</div></td><td><input type="text" name="mail" maxlength="80" onblur="validate('mail',this.value,'')" class="field"></td></tr><tr class="vld"><td></td><td id="mail"></td></tr>
<tr><td><div class="descrip">Password </div></td><td><input type="password" name="pass" maxlength="50" onkeyup="validate('pass',this.value,'')" class="field"></td></tr><tr class="vld"><td></td><td id="pass"></td></tr> 
<tr><td><div class="descrip">Confirm password </div></td><td><input type="password" name="confirm" maxlength="50" onkeyup="validate('confirm',this.value,rform.pass.value)" class="field"></td></tr><tr class="vld"><td></td><td id="confirm"></td></tr>
<tr><td><div class="descrip">Phone</div></td><td><input type="text" name="phn" maxlength="10" onblur="validate('phn',this.value,'')" class="field"></td></tr><tr class="vld"><td></td><td id="phn"></td></tr> 
<tr><td><div class="descrip">Address Line1</div></td><td><input type="text" name="ad1" onblur="validate('ad1',this.value,'')" maxlength="80" placeholder="Flat No/Street" class="field"></td></tr><tr class="vld"><td></td><td id="ad1"></td></tr>       <!--Modify address as city state-->
<tr><td><div class="descrip">Address Line2 </div></td><td><input type="text" name="ad2" onblur="validate('ad2',this.value,'')" maxlength="80" placeholder="City/State" class="field"></td><tr class="vld"><td></td><td id="ad2"></td></tr> 
<tr><td><div class="descrip">Pincode</div></td><td><input type="text" name="pc" onkeyup="validate('pc',this.value,'')" maxlength="6" class="field"></td></tr><tr class="vld"><td></td><td id="pc" ></td></tr> </table>
<input class="valsub" type="button" onclick="valid()" value="Register" name="sb"/>
</div>
</form>
</div>
</div>
</div>
<?php
	@include 'footer.php';
	?>
	 
	<!-- Placed at the end of the document so the pages load faster -->
	  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <script src="js/reg.js"></script>
	  <script src="js/social.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/563364bb058f6383051fcf4a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>