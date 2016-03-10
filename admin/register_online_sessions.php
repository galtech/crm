<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
//if(!session_is_registered(myusername)){
if(!$_SESSION['myusername']){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
$continue="../mainmenu.php";
$storeuser = $_GET['username'];


mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM crmuser WHERE username='$storeuser'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);

$i=0;
while ($i < $num1) {
$uid=mysql_result($result1,$i,"uid");
$initials=mysql_result($result1,$i,"initials");
$firstname=mysql_result($result1,$i,"firstname");
$lastname=mysql_result($result1,$i,"lastname");
$user_username=mysql_result($result1,$i,"username");
$user_password=mysql_result($result1,$i,"password");
$telephone=mysql_result($result1,$i,"telephone");
$email=mysql_result($result1,$i,"email");
$role=mysql_result($result1,$i,"role");

$i++;
}

//$date = date_create();
//$logged_in_time = date_format($date, 'U = Y-m-d H:i:s') . "\n";
$logged_in_time = date("Y-m-d H:i:s");

$query2 = "INSERT INTO onlineusers VALUES ('','$uid','$initials','$user_username','$firstname','$lastname','$telephone','$email','$role','$logged_in_time')";
mysql_query($query2);

mysql_close();

if ($role == 'Administrator')
{
	header("location:../adminmenu.php?id=$uid");
}
else if ($role == 'User')
{
	header("location:../mainmenu.php?id=$uid");
}
else if ($role == 'NA')
{
	header("location:../error_pages/noaccess.php");
}
else
{
	header("location:../error_pages/loginerror.php");
}
/*
else
{
	header("location:../mainmenu.php?id=$uid");
}
*/
/*
else if ($role == 'User')
{
	header("location:../mainmenu.php?id=$uid");
}
else if ($role == 'NA')
{
	header("location:../error_pages/noaccess.php");
}
else
{
	header("location:../error_pages/loginerror.php");
}
*/
/*
if ($role == 'Administrator')
{
	header("location:../adminmenu.php?id=$uid&amp;role=$role");
}
else if ($role == 'Sales')
{
	header("location:../mainmenu.php?id=$uid&amp;role=$role");
}
else if ($role == 'Accounts')
{
	header("location:../mainmenu.php?id=$uid&amp;role=$role");
}
else if ($role == 'NA')
{
	header("location:../error_pages/noaccess.php");
}
else
{
	header("location:../error_pages/loginerror.php");
}
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<!--
<head>
<meta http-equiv='refresh' content='0;url=../mainmenu.php?id=<?echo $uid;?>'>
<title>Logging in</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#ffffff" text="#000000">

<div>
<center>
<br>Logging in

</center>
</div>

</body>
-->
</html>
