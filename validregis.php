<?php
require 'conf.inc.php';
$value=$_GET['val1'];
$field=$_GET['field'];
$value2=$_GET['val2'];
if($field=="nm")     //checking valid name
{
	if(strlen($value)==0)
		echo "Invalid Cant be empty";
}
else if($field=="pass")   //checking password length
{
	if(strlen($value)<6)
		echo "Invalid should be minimum 6 characters";
}
else if($field=="confirm")   //checking both password same
{
	if(strlen($value)==0)
		echo "Invalid Cant be empty";
	else if($value!=$value2)         //confirming password match
		echo "Invalid Password don't match";
}
else if($field=="mail" && $value2="isvalid")  //checking syntax of mail id
{
		if (!filter_var($value,FILTER_VALIDATE_EMAIL))  //If mail not valid.
		{
			echo "Invalid Email id";
		}
		if(!checkdupli($value,$pd))
			echo "Invalid This id is already in use";
}
else if($field=="phn")    //phone number validation
{
	if(strlen($value)!=10 || !is_numeric($value))
		echo "Invalid Phone Number";
}
else if($field=="ad1")
{
	if(strlen($value)==0)
		echo "Invalid Address";
}
else if($field=="ad2")      //address validation
{
	if(strlen($value)<4)
		echo "Invalid Please enter your city and state";
}
else if($field=="pc")
{
	if(strlen($value)!=6 || !is_numeric($value))
		echo "Invalid Pin code";
}
else
{

}
function checkdupli($mail,$pd)
{
	$stmt=$pd->prepare("Select userid from regis where mail=?");
	$stmt->execute(array($mail));
	if($row=$stmt->fetch(PDO::FETCH_ASSOC))
		return false;
	else
		return true;
}
?>