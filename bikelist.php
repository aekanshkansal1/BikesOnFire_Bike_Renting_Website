<!DOCTYPE html>
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
    <!-- Custom styles for this template -->
    <link type="text/css" href="css/bikestyle.css" rel="stylesheet">
    <link type="text/css" href="css/footercorrection.css" rel="stylesheet">

      

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
	@include 'header_ini.php';
}
?>
	
	
    <p id="heading">Our Fleet</p>
    <?php
    $BKCNT=1;
    function getrow()
    {
    	global $BKCNT;
    	if($BKCNT<=4)
    		return 'row1';
    	else
    		return 'row2';
    }
    function getcol()
    {
    	global $BKCNT;
    	if($BKCNT<=4)
    		return 'col'.$BKCNT;
    	else
    		return 'col'.($BKCNT-4);
    }
    $nodata=true;      //if no data present then this variable will always be true
    @require 'conf.inc.php';
    $stmt=$pd->prepare("select bkid,bkname,bkdesc,bkimg,bkprc from bikes");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    //	$desc=$row['bkdesc'].substring(0,80);
    	//NEW ROW CREATION
    	if($BKCNT==1 || $BKCNT==5)     //row created only when previous row is filled
    	{
 		echo '<div id="'.getrow().'">';
		echo '<div class="container"><div class="row">';
		$open=true;  //The new row div is open yet
		}

	    echo '<a href="bikedesc.php?bkid='.$row['bkid'].'"><div class="col-sm-3">';

		echo '<div id="'.getrow().getcol().'"><div class="thumbnail">';
		 echo "<img height='200px' src='data:image;base64,".$row['bkimg']."' alt=''/></div>
			<div class='ximg'><div class='name'>";
			echo "<p>".$row['bkname']."</p></div>";
			echo "<div class='desc'><p>".$row['bkdesc'].".<span id='see'>See more... </span> </p></div>
			<div class='booknow'>Book now</div>";
			echo "<div class='price'><p>₹ ".$row['bkprc']."/day</p></div>
		  </div></div>
		  </div>
		  </a>";

		  if($BKCNT==4 || $BKCNT==8)          //when row is filled close the row division
		  {
		  	echo "</div></div></div>";   //closing row
		  	$open=false;
		  }
		  $BKCNT++;
		  if($BKCNT>8)
		  	$BKCNT=1;
	}
	if($nodata==false && $open==true)     //if row is not filled and list ended then close row
	{
		  	echo "</div></div></div>";   //closing row
		  	$open=false;
	}
    if($nodata==true)
    {
        echo "No Bike Added Yet";
    }
?>
<!--		  <a href="bikedesc.php">
		<div class="col-sm-3">
		  <div id="row1col2">
		    <div class="thumbnail"><img src="img/bike2.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 2</p></div>
			<div class="desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <span>See more...</span></p></div>
			<div class="booknow">Book now</div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
		</a>
		<div class="col-sm-3">
		  <div id="row1col3">
		    <div class="thumbnail"><img src="img/bike3.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 3</p></div>
			<div class="desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <span>See more...</span> </p></div>
			<div class="booknow">Book now</div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
		<div class="col-sm-3">
		  <div id="row1col4">
		    <div class="thumbnail"><img src="img/bike1.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 1</p></div>
			<div  class="desc"><p >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod  <span>See more...</span></p></div>
			<div class="booknow">Book now</div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
	  </div>
	  </div>
	</div>
	
	<!--second row-->
<!--	<div id="row2">
	<div class="container">
	<div class="row">
	    <div class="col-sm-3">
		  <div id="row1col1">
		    <div class="thumbnail"><img src="img/bike1.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 1</p></div>
			<div class="desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod  <span>See more...</span></p></div>
			<div class="booknow">Book now </div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
		<div class="col-sm-3">
		  <div id="row1col2">
		    <div class="thumbnail"><img src="img/bike2.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 2</p></div>
			<div class="desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <span>See more...</span></p></div>
			<div class="booknow">Book now</div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
		<div class="col-sm-3">
		  <div id="row1col3">
		    <div class="thumbnail"><img src="img/bike3.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 3</p></div>
			<div class="desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <span>See more...</span></p></div>
			<div class="booknow">Book now</div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
		<div class="col-sm-3">
		  <div id="row1col4">
		    <div class="thumbnail"><img src="img/bike1.jpg" alt=""/></div>
			<div class="ximg">
			<div class="name"><p>Bike 1</p></div>
			<div  class="desc"><p >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod  <span>See more...</span></p></div>
			<div class="booknow">Book now</div>
			<div class="price"><p>Cost-500/day</p></div>
		  </div></div>
		</div>
	  </div>
	  </div>
	</div>-->
<?php
	@include 'footer.php';
	?>
	 	<!-- Placed at the end of the document so the pages load faster -->
	 <!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	  <script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>
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