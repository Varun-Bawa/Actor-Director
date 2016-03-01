<?php

include '../config/config.php';

$name		=	$_POST['name'];
$email		=	$_POST['email'];
$category	=	$_POST['act-dir'];
$phone		=	$_POST['phone'];
$about		=	$_POST['about'];

$chk	=	mysql_query("SELECT * from $category WHERE email='".$email."'");
$count	=	mysql_num_rows($chk);

if($count==0)
	$entry	=	mysql_query("INSERT into $category values('$name','$email','$phone','$about')") or die(mysql_error());
else
{
	$update	=	mysql_query("UPDATE $category set name='$name',phone='$phone',about='$about' WHERE email='".$email."'") or die(mysql_error());
}
if(isset($entry))
	echo "<script>alert('Profile Registered');window.location='../';</script>";
else
	if(isset($update))
			echo "<script>alert('Profile Updated');window.location='../';</script>";
else
	echo "<script>alert('Facing Some Technical Difficulties! Please Contact Admin.');window.location='register/'</script>";
?>
