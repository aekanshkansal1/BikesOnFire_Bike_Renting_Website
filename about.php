 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     
    <link rel="icon" href=" ">

    <title>BikesOnFire</title>

    <!-- Bootstrap core CSS -->
     <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	   <link type="text/css" href="css/header.css" rel="stylesheet">
     <link type="text/css" href="css/footer.css" rel="stylesheet">
     <link type="text/css" href="css/footercorrection.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link type="text/css" href="css/aboutus.css" rel="stylesheet">
      
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

	<div id="enclosure1">
	<div class="container">
	<div id="aboutus">
      <p id="heading">About Us</p>
      <p id="bigtext"><strong>BikesOnFire.com is a Bike rental company operating across various cities across India.We provide bikes to the bikers who are in search of hassle free service.</strong></p>
      <p id="smalltext">We aim to solve Bike Renting problems through technology. Bike Renting exists since past 40 years and the market was highly unorganised. We, at Bikesonfire, are striving hard to remove all the hassles of a rider who wants a bike on rent and bring transparency in the process and the same can be achieved by the efficient use of technology and design.Our Vision is to become largest On Demand Renting Service in the country.Through this plaform we have laid the First milestone.
       </p>
	</div>
	</div>
</div>
<div id="enclosure2">
	<div class="container">
      <div id="founder">
      	<p id="heading">Founder Board</p>
      	<div id="foundername">
  			<div class="rows">
 				<div class="col-sm-6"><div class="image"><img src="img/kansal.jpg" class="setimg" alt="No image"></div><div class="naam">Co-Founder Name1</div><div class="desig">Co-Founder</div></div> 
 				<div class="col-sm-6"><div class="image"><img src="img/kansal.jpg" class="setimg" alt="No image"></div><div class="naam">Co Founder Name2</div><div class="desig">Co-Founder</div> </div>
 			 </div>
 			 <div class="rows">
                 <div class="col-sm-6"><div class="image"><img src="img/kansal.jpg" class="setimg" alt="No image"></div><div class="naam">Co Founder Name3 </div><div class="desig">Co-Founder</div> </div>
                 <div class="col-sm-6"><div class="image"><img src="img/pratap.jpg" class="setimg" alt="No image"></div><div class="naam">Co Founder Name4</div><div class="desig">Co-Founder</div> </div>
 			 </div>
 			 <div class="rows">
  				 <div class="col-sm-6"><div class="image"><img src="img/pratap.jpg" class="setimg" alt="No image"></div><div class="naam">Co Founder Name5</div><div class="desig">Co-Founder</div> </div>
  				 <div class="col-sm-6"><div class="image"><img src="img/pratap.jpg" class="setimg" alt="No image"></div><div class="naam">Co Founder Name6</div><div class="desig">Co-Founder</div> </div>
  			 </div>
  			</div>
      	</div>
      </div>
	</div>
</div>



<?php
	@include 'footer.php';
	?>
	 
	<!-- Placed at the end of the document so the pages load faster -->
	  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <!--<script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>-->
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