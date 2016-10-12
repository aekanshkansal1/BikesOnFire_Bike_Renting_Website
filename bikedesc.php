<?php
//Required make a field for inputing the status Add cities preferences
session_start();
if(isset($_SESSION['mail']))   //if logged in then only can access
{

	//show a diffent header
	include 'header_logged.php';
}
else
{
	header("Location:index.php?stt=unautho");
}
 ?>
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

    <!-- Custom styles for this template -->
    <link type="text/css" href="css/bikedesc.css" rel="stylesheet">
    <link type="text/css" href="css/footerfordesc.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css" >
      

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php
if(isset($_GET['st']))  //giving status
{
	$stats=$_GET['st'];
	if($stats=="incomp")  //if form is incomplete
		echo "<div id='error'>Fill all the fields</div>";
	else if($stats=="book")  //if ride is booked
		echo "<div id='error'>YOUR RIDE IS BOOKED<br/><br/><br/>We will contact you soon.  Have a Good day</div>";
	else if($stats=="err")  //if error in feeding in database
		echo "<div id='error'>Error Let us Know Contact admin</div>";
	else
	{

	}
}

?>
	 <div class="container">
	 
		<div id="all">
		<div id="littleall">
		 
		<div class="row"> 
		<div class="col-sm-6">
		<div id="img">
	<?php     //getting information of particular bike
	@require 'conf.inc.php';
		if(isset($_GET['bkid']))
		{
	$bkid=$_GET['bkid'];
	$_SESSION['bkids']=$bkid;
    $stmt=$pd->prepare("select bkname,bkdesc,bkimg,bkprc from bikes where bkid=?");
    $stmt->bindParam('1',$bkid);
    $stmt->execute();
    if($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {

	     echo '<img src="data:image;base64,'.$row['bkimg'].'"/>';
	   echo '</div>  
	     </div>
		 <div class="col-sm-6" id="ximg">';
	   echo "<div id='desc'><p>".$row['bkdesc']."</p></div>";
	   echo '<form method="POST" action="booknow.php"><div id="num"><label>Number of days </label><input type="number" min="0" maxlength="4" name="numday"></div>';
	   echo '<div id="date"><label>Booking date&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" id="datepicker" name="dt" readonly></div>';
    	echo '<table id="rentNcost"><tr><td><div><input type="submit" name="sb" value="Checkout" id="rent"></div></a></td>
	   <td><div id="costday"><label>Cost</label>&nbsp;&nbsp;'.$row['bkprc'].'&#8377;/Day</div></td></tr></table></form>';
	}
	}
	   ?>
	     </div></div>
	   </div></div>
	 </div>
	 
	<?php
	@include 'footer.php';
	?>
	 
	<!-- Placed at the end of the document so the pages load faster -->
	  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <script src="js/jquery-ui.min.js"></script>
	  <script src="js/social.js"></script>
	  <script src="js/datepicker.js"></script>

  </body>
</html>