<?php
if(!isset($_GET['type']))
die('Unable to Do this.Go back and click Right link');
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']=="true")
{
	header("Location:index.php?stt=invalid");
}
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

    <!-- Custom styles for this template -->
    <link type="text/css" href="css/bikestyle.css" rel="stylesheet">

      

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
        $nodata=false;
    //	$desc=$row['bkdesc'].substring(0,80);
    	//NEW ROW CREATION
    	if($BKCNT==1 || $BKCNT==5)     //row created only when previous row is filled
    	{
 		echo '<div id="'.getrow().'">';
		echo '<div class="container"><div class="row">';
		$open=true;  //The new row div is open yet
		}

	    echo '<div class="col-sm-3">';

		echo '<div id="'.getrow().getcol().'"><div class="thumbnail">';
		 echo "<img height='200px' src='data:image;base64,".$row['bkimg']."' alt=''/></div>
			<div class='ximg'><div class='name'>";
			echo "<p>".$row['bkname']."</p></div>";
			echo "<div class='desc'><p>".$row['bkdesc'].".<span>See more... </span> </p></div>
			<a style='text-decoration:none;' href='".$_GET['type']."bike.php?bkid=".$row['bkid']."'><div class='booknow'>".$_GET['type']."</div></a>";
			echo "<div class='price'><p>Cost-".$row['bkprc']."/day</p></div>
		  </div></div>
		  </div>";

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

    <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <!--<script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script> -->  
      <script src="js/user.js"></script>
</body>
</html