<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
//$uid = $_GET['id'];

$ud_initials=$_POST['ud_initials'];
$ud_firstname=$_POST['ud_firstname'];
$ud_lastname=$_POST['ud_lastname'];
$ud_username=$_POST['ud_username'];
$ud_password=$_POST['ud_password'];
$ud_tel=$_POST['ud_telephone'];
$ud_email=$_POST['ud_email'];
$ud_role=$_POST['ud_role'];
$ud_userid=$_POST['ud_userid'];

$uid=$_POST['uid'];

$md5password = md5($ud_password);

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);


$i=0;
while ($i < $num1) {
$uid=mysql_result($result1,$i,"uid");
$initials=mysql_result($result1,$i,"initials");
$firstname=mysql_result($result1,$i,"firstname");
$lastname=mysql_result($result1,$i,"lastname");
$username=mysql_result($result1,$i,"username");
$i++;
}
$res_firstname = mysql_real_escape_string($ud_firstname);
$res_lastname = mysql_real_escape_string($ud_lastname);

$query = "UPDATE crmuser SET initials='$ud_initials',firstname='$res_firstname',lastname='$res_lastname',username='$ud_username',password='$md5password',telephone='$ud_tel',email='$ud_email',role='$ud_role' WHERE uid='$ud_userid'";
mysql_query($query);


mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<!--<meta http-equiv='refresh' content='0;url=../mainmenu.php?id=<?echo $uid;?>'>-->
<title>Footfall CRM</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>You are logged in as <b><?echo $firstname." ".$lastname." ";?></b><a href="../logout.php?uid=<?echo $uid;?>">Logout</a></p>
<center>
<div id="wrapper">

<div id="header">
<div id="logo"><h1>footfall</h1></div>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
</div>
<div id="content">
<table border="0">
<tr>
<td><form method="post" action="../adminmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
</tr>
</table>
<br />
The user has been updated successfully. <a href="../view/view_users.php?uid=<?echo $uid;?>">Click here to continue</a> 
<br /><br />
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>

</body>
</html>
