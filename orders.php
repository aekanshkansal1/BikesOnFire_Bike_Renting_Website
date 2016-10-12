<!DOCTYPE html>
<html>
<head>
<title>BikesOnFire</title>
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="css/aboutus.css" rel="stylesheet">
  <link type="text/css" href="css/order.css" rel="stylesheet">
</head>
<?php
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']=="true")
{
	header("Location:index.php?stt=invalid");
}
if(!isset($_GET['bookindex']))
{
  header("Location:bikepanel.php?state=noind");    //if no booking index
}
echo '<div class="container">
<div id="toppsp">
</div>';
if($_GET['bookindex']>0)   //getting 10 booking at a time
$endlimit=$_GET['bookindex']*10;
else
$endlimit=10;
$stlimit=$endlimit-9;
$pageno=($_GET['bookindex']-($_GET['bookindex']%10))+1;
echo "<div id='linking'>";
if($pageno!=1)
echo '<a id="lnk" href="orders.php?bookindex='.($pageno-10).'"><button>Prev</button></a>';
for($i=0;$i<10;$i++)
echo '<a id="lnk" href="orders.php?bookindex='.($pageno+$i).'"><button>'.($pageno+$i).'</button></a>';
echo '<a id="lnk" href="orders.php?bookindex='.($pageno+10).'"><button>Next</button></a>';
echo "</div>";
require 'conf.inc.php';
    //Getting all orders
    $stmt=$pd->prepare("select bikes.bkname,booking.userid,booking.dt,booking.bookno,booking.bookdt,booking.days,booking.bkid from booking INNER JOIN bikes ON booking.bkid=bikes.bkid ORDER BY booking.bookdt,booking.dt limit ".$stlimit.",".$endlimit);
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      //getting user information
      $usstmt=$pd->prepare("select nm,mail,ph,addl1,addl2,pin from regis where userid=".$row['userid']);
      $usstmt->execute();
      $row1=$usstmt->fetch(PDO::FETCH_ASSOC);
    	echo '<div id="myorders">';
      echo 	'<div id="topic">Booking</div><div id="contents">';
	 		echo '<div id="bookno">Booking ID:&nbsp;'.$row['bookno'].'</div>';
	 		echo '<div id="bookedon">Date of booking:&nbsp;'.$row['bookdt'].'</div>';
	 		echo '<div class="row">
        		<div class="col-sm-6"><img height="200px" src="" alt="bikes image"/></div>
        		<div class="col-sm-6">';
      echo '<div id="name">'.$row['bkname'].'</div>
              <div id="numdays">Pickup Date:&nbsp;'.$row['dt'].'</div>
        			<div id="numdays">Total days:&nbsp;'.$row['days'].'</div>
              <div id="name1">Customer Name:&nbsp;'.$row1['nm'].'</div>
              <div id="numdays">Mail id:&nbsp;'.$row1['mail'].'</div>
              <div id="numdays">Contact no:&nbsp;'.$row1['ph'].'</div>
              <div id="numdays">Address:&nbsp;'.$row1['addl1'].'</div>
              <div id="numdays1">&nbsp;'.$row1['addl2'].'-'.$row1['pin'].'</div>
        		</div>
	 		</div>
   		</div>
 	</div>';
 }
?>
<div id="botmsp">
</div>
</div>
</html>