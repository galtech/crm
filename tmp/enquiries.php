<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
//if(!session_is_registered(myusername)){
if(!$_SESSION['myusername']){
header("location:index.php");
}
include("include/dbinfo.inc.php");
// $user = myusername;
// $_SESSION['myusername'] = $_POST['myusername'];
// $storeuser = $_SESSION['myusername'];
$uid = $_GET['id'];

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

mysql_close();

?>
<html>
<head><title>Footfall CRM</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
<p>You are logged in as <b><?echo $firstname." ".$lastname." ";?></b><a href="logout.php?uid=<?echo $uid;?>">Logout</a></p>
<center>
<div id="wrapper">

<div id="header">
<div id="logo"><h1>footfall</h1></div>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
</div>
<div id="content">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td><form method="post" action="mainmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
<td><form method="post" action="search.php?id=<?echo $uid;?>"><input type="submit" value="Search" /></form></td>
<td><form method="post" action="salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form></td>
<td><form method="post" action="enquiries.php?id=<?echo $uid;?>"><input type="submit" value="Enquiries" /></form></td>
</tr>
</table>
<br /><br /><br />

<b><center>Enquiries</center></b><br><br>
<br />

</div>
<div id="footer">
<br />
Footfall CRM 1.6 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
