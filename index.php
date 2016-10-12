 <!--Add chat option-->
 <!DOCTYPE html>
<html lang="en">
  <head>

<title> BikesOnFire | Bike Rental Company </title>
<meta name="Description" content="India's largest bike rental company with presence in 10 cities.">
<meta name="Keywords" content="bikesonfire bike rental delhi">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     
    <link rel="icon" href="img/favicon.ico">

   <!---- <title>BikesOnFire</title>------------>
    <!-- Bootstrap core CSS -->
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/header.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link type="text/css" href="css/style.css" rel="stylesheet">
    <!--<link type="text/css" href="css/footer.css" rel="stylesheet">-->
     

    <!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
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
<?php
//Give the status
//display it properly
if(isset($_GET['stt']))
{
	$stt=$_GET['stt'];
	echo "<div id='error'><p>";
	if($stt=="reg")  //registered successfully
	echo "Registered Successfully";
	else if($stt=="alreg")  //registered successfully
	echo "Already Registered";
	else if($stt=="unautho")  //Unauthorized access
	echo "Please Login to Access";
	else if($stt=="success")  //Login Successful
	echo "Login Successful";
	else if($stt=="invalid")  //Incorrect mail or password
	echo "Incorrect Login id or password";
	else if($stt=="empty")  //Fields can't be empty
	echo "Fields cant be Empty";
	else if($stt=="verstep")  //verify mail id
		echo "Please verify your Email id";
	else if($stt=="ver")  //verify mail id
		echo "Successfully Verified Email id";
	else if($stt=="accden")  //verify mail id
		echo "Access Denied";
	else if($stt=="logot")  //Log out successfully
		echo "Logged Out Successfully";
	else
	{
	}
			echo "</p></div>";
}
?>
         <div id="city"><p>Our Presence<span class="caret"></span></p></div>
	 <div  id="listofcity" class="hidden">
	  <ul class="compcity">
	    <li>Delhi</li>
		<li>Dehradun</li>
		<li>Jaipur</li>
		<li>Shimla</li>
		<li>Manali</li>
		<li>Rishikesh</li>
		<li>Guwahati</li>
		<li>Haridwar</li>
		<li>Leh</li>
		<li>Bangalore</li>
	  </ul>
       
	</div> 
	 <div class="central">
	    <div class="container">
		  
		</div>
	    
	 </div>
	 <a href="#"><div class="elevator-button"><div class="glyphicon glyphicon-chevron-up"></div></div></a>
	 
	 <div class="process">
	  
	  <div class="explain" ><p>What's the process?</p></div>
	    <div class="container">
		  <div class="rows">
		    <div class="col-md-3"><div id="location"><img src="img/visitWebsite.jpg" alt="Visit our website"></div></div>
			<div class="col-md-3"><div id="location"><img src="img/chooseOption.jpg" alt="Choose your option"></div></div>
			<div class="col-md-3"><div id="location"><img src="img/preference.jpg" alt="Tell us your preference"></div></div>
			<div class="col-md-3"><div id="location"><img src="img/enjoy.jpg" alt="Enjoy your ride"></div></div>
		  </div>
		</div>
		  
		</div>
	   
	  
	<div class="whywe">
	 
	  <div class="whyus">Why us?</div>
	
	<div class="container">
	
	  <div id="promise">
	  <div class="row">
	  <div class="col-md-4">
	  <div class="trust">Trustworthy platform<br/><br/><br/>A Reliable and Secure Platform for renting bikes with Ease</div>
          </div>
	 <div class="col-md-4">
	  <div class="price"> Reasonable pricing<br/><br/><br/>Pricing that suits your pocket and provides Quality Service</div>   
	 </div>
	 <div class="col-md-4">
	  <div class="testdrive">Easy renting process<br/><br/><br/>Book a Bike Online and We will handle the Rest</div>   
	  </div>
	  </div>
	  </div>
	</div>

	</div>
	<div class="ourfleet">
	  <div class="fleet">Our Fleet</div>
	   
	  <div class="container">
	  <div class="row" id="firstrow">
	    <div class="col-sm-3">
		    <div class="thumbnail"><img src="img/bajajavenger.jpg" alt="Rent Bike in Delhi" class="photo"/></div>
			<div class="specs">Bajaj Avenger</div>
		  </div>
		  
		  <div class="col-sm-3">
		    <div class="thumbnail"><img src="img/re.jpg" class="photo"/></div>
			<div class="specs">Royal Enfield</div>
		  </div>
		   
		  <div class="col-sm-3">
		    <div class="thumbnail"><img src="img/thunderbird.jpg" class="photo"/></div>
			<div class="specs">Thunderbird</div>
			</div>
			<div class="col-sm-3">
		    <div class="thumbnail"><img src="img/bajajpulsar.jpg" class="photo"/></div>
			<div class="specs">Bajaj Pulsar</div>
		  </div>
		  </div>
		</div>
		<div class="container">
		
          <div class="seemore"><a href="bikelist.php">See more</a></div>

		</div>
		<!--<div class="container">
	  <div class="row" id="secondrow">
	    <div class="col-sm-4">
		    <div class="thumbnail"></div>
			<div class="specs"></div>
		  </div>
		  
		  <div class="col-sm-4">
		    <div class="thumbnail"></div>
			<div class="specs"></div>
		  </div>
		   
		  <div class="col-sm-4">
		    <div class="thumbnail"></div>
			<div class="specs"></div>
		  </div>
		  </div>
		</div>-->
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
	  <script src="js/user.js"></script>
	<script src="js/elevator.min.js"></script>
	<script src="js/elevator.js"></script>
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
