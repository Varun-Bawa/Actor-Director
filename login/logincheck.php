<?php
//index.php login form redirect here
include '../config/config.php';
session_start();

$email 		=	$_POST['email'];
$category	=	$_POST['category'];

$chk= mysql_query("SELECT * FROM $category WHERE email='".$email."'") or die(mysql_error());

$arr=mysql_fetch_array($chk);

$cou=mysql_num_rows($chk);

if($cou == 0)
{
	echo "<script>alert('No Entry for Corresponding Email and Category');window.location ='../';</script>";
}
else
{	
	$_SESSION['name']	=	$arr[0];
	$_SESSION['email']	=	$email;
	$_SESSION['phone']	=	$arr[2];
	$_SESSION['about']	=	$arr[3];
	
		header('Location: ../');
}
?>