<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
$uid = $_GET['uid'];
$userid = $_GET['userid'];

//$userid=$_POST['userid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);
//$username = mysql_db_name($result1,$row['username']);

$i=0;
while ($i < $num1) {
$uid=mysql_result($result1,$i,"uid");
$initials=mysql_result($result1,$i,"initials");
$firstname=mysql_result($result1,$i,"firstname");
$lastname=mysql_result($result1,$i,"lastname");
$username=mysql_result($result1,$i,"username");
$i++;
}

$query2 = "SELECT * FROM crmuser WHERE uid='$userid'";
$result2 = mysql_query($query2);
//$num2 = mysql_numrows($result2);

while($row = mysql_fetch_array($result2)){
	$usernames = $row['username'];
}
/*
$j=0;
while ($j < $num2) {
$uid=mysql_result($result2,$j,"uid");
$initials=mysql_result($result2,$j,"initials");
$firstname=mysql_result($result2,$j,"firstname");
$lastname=mysql_result($result2,$j,"lastname");
$usernames=mysql_result($result2,$j,"username");
$passwords=mysql_result($result2,$j,"password");
$tel=mysql_result($result2,$j,"telephone");
$email=mysql_result($result2,$j,"email");
$role=mysql_result($result2,$j,"role");

$j++
}
*/

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
Are you sure you want to remove user <?php echo $usernames;?>? <a href="../delete/delete_user.php?userid=<?php echo $userid;?>&amp;uid=<?php echo $uid;?>">Click here to continue</a> 
<br /><br />
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>

</body>
</html>
