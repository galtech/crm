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

<br /><br /><br />

Welcome to the Footfall CRM system. 
<form method="post" action="adminmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form>
<br /><br />
<form method="post" action="add/add_user.php?id=<?echo $uid;?>"><input type="submit" value="New User" /></form>
<form method="post" action="view/view_users.php?uid=<?echo $uid;?>"><input type="submit" value="Manage Users" /></form>
<form method="post" action="admin/csvbackups.php?id=<?echo $uid;?>"><input type="submit" value="Backup to CSV" /></form>
<form method="post" action="admin/sqlbackup.php?id=<?echo $uid;?>"><input type="submit" value="Backup to SQL" /></form>
<form method="post" action="admin/logout_allusers.php?id=<?echo $uid;?>"><input type="submit" value="Log Out All Users" /></form>
<form method="post" action="admin/view_sessions.php?id=<?echo $uid;?>"><input type="submit" value="View User Sessions" /></form>
<!--<form method="post" action="admin/import_company_contacts.php?id=<?echo $uid;?>"><input type="submit" value="Import Company / Contacts" /></form>-->
</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
