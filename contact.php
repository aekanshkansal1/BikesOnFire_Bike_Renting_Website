<!--decide whether to post query with out login or not-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     
    <link rel="icon" href="img/favicon.ico">

    <title>BikesOnFire</title>

    <!-- Bootstrap core CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/header.css" rel="stylesheet">
	 <link type="text/css" href="css/bikedesc.css" rel="stylesheet">
	<link type="text/css" href="css/contact.css" rel="stylesheet">
    <!-- Custom styles for this template -->     
   
     <script>
     function validq()
     {
     	if(document.getElementById("phone").value.length!=10 || isNaN(document.getElementById("phone").value))
     	{
     		alert("Invalid Phone number");
     		return false;
     	}
     	else if(document.getElementById("nm").value=="")
     	{
     		alert("Invalid Name");
     		return false;
     	}
     	else if(document.getElementById("message").value=="")
     	{
     		alert("Invalid Message");
     		return false;
     	}
     	else
     		return true;
     }
     </script>
      

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
  <!--Header-->
  <?php
  session_start(); 
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

  <!--<nav class="navbar navbar-default navbar-fixed-top">
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
		    <li><a href="index.php" class="link">Home</a></li>
			<li><a href="bikelist.php" class="link">Rent</a></li>
			<li><a href="about.php" class="link">About Us</a></li>
			<li><a href="contact.php" class="link">Contact Us</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <li><a href="register.php" class="link overlayLink"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
			<li><a href="" class="link overlayLink1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
		</div>
	  </div>
	</nav>-->
	<div class="container">
       
	    <div id="mailNphone">
		    <div id="fleft">
		    <p style="font-size:2em">Contact us:</p>
			<p>booking@bikesonfire.com</p> 
		    <p>ceo@bikesonfire.com </p> 
		  </div>
		  <div id="fright">
		  	<div id="toright">
		  	<p>Have any problem in booking</p>
		    <p>Contact info:</p>
		  
		  
		    <p>(+91)7836964803</p>
		  
		  
		    
			<p>(+91)7503395212</p>
		  
		 
		   
			<p>(+91)8373946282</p>
		 </div> 
	   </div>
	  </div>
	</div>
	<div id="formwrapper">
	  <form class="" method="POST" action="askquery.php" onsubmit="return validq()">
	  <table id="ctable">
	    <tr><td><label name="name">Name:</label></td><td><input type="text" name="name" id="nm"></td></tr>
<!--		<tr><td><label name="mail">E-mail:</label></td><td><input type="text" name="mail" id="mailid"></td></tr>-->
		<tr><td><label name="ph">Phone Number:</label></td><td><input type="text" name="ph" id="phone" maxlength="10"></td></tr>
		<tr><td><label name="mess">Message:</label></td><td><textarea name="mess" id="message" rows="5" cols="50"></textarea></td></tr>
		</table>
		<button type="submit" value="submit" id="submit">  <!--<?php if(!isset($_SESSION['mail'])) echo "disabled";?>-->Submit</button>
	  </form>
	 </div>
		 
<?php
	@include 'footer.php';
	?>
	 
	  
	<!-- Placed at the end of the document so the pages load faster -->
	  <!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	  <script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	  <script src="js/jquery-ui.min.js"></script>
	  <script src="js/social.js"></script>
	  <script src="js/user.js"></script>	
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