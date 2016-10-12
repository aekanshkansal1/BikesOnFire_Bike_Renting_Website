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
	<link type="text/css" href="css/footer.css" rel="stylesheet">
  <link type="text/css" href="css/footercorrection.css" rel="stylesheet">
    <link type="text/css" href="css/aboutus.css" rel="stylesheet">
	<link type="text/css" href="css/order.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
      
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
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
    header("Location:index.php?stt=unautho"); 
	}
?>
<div class="container">
<div id="toppsp">
</div>
<?php
require 'conf.inc.php';
    $user=$_SESSION['userid'];
    $stmt=$pd->prepare("select bikes.bkname,bikes.bkimg,booking.userid,booking.dt,booking.bookno,booking.bookdt,booking.days,booking.bkid from booking INNER JOIN bikes ON booking.bkid=bikes.bkid AND booking.userid=".$user);
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    	echo '<div id="myorders">';
      echo 	'<div id="topic">Booking</div><div id="contents">';
	 		echo '<div id="bookno">Booking ID:&nbsp;'.$row['bookno'].'</div>';
	 		echo '<div id="bookedon">Date of booking:&nbsp;'.$row['bookdt'].'</div>';
	 		echo '<div class="row">
        		<div class="col-sm-6"><img height="200px" src="data:image;base64,'.$row['bkimg'].'" alt="bikes image"/></div>
        		<div class="col-sm-6">';
      echo '<div id="name">'.$row['bkname'].'</div>
              <div id="numdays">Pickup Date:&nbsp;'.$row['dt'].'</div>
        			<div id="numdays">Total days:&nbsp;'.$row['days'].'</div>
        		</div>
	 		</div>
   		</div>
   
 	</div>';
 }
?>
<div id="botmsp">
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
  </body>
</html>