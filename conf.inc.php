<?php
try
{
	$servername="localhost";       //name of the host
	$username="root";        //user name
	$password="";         //user password
	$dbname="firebikes";        //database name
	//connecting to database
	$pd=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	//setting pdo error mode to exception
	$pd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Error:Let us know Contact Admin.";//$e->getMessage();
}
?>