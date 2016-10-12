 <html>
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
	<link type="text/css" href="css/verify.css" rel="stylesheet">
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
<div class="container">
	<div id="securecode">
		
<form action="verifydb.php" method="POST" >
<div id="field"><label>Enter Code</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" min="0" name="scd"></div>
<div id="buttonwrap" ><input type="submit" value="Verify" id="button"></div>
</form>	  
<!--<div id="resend"><a href="" id="resendlink"><div class="glyphicon glyphicon-refresh" style="font-size:2em"></div>Resend security code</a></div>-->

</div>
</div>
<?php
	@include 'footer.php';
?>
	  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <!--<script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>-->
	  <script src="js/jquery-ui.min.js"></script>
	  <script src="js/social.js"></script>
	  <script src="js/user.js"></script>	  

</body>
</html>