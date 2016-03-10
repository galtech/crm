<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
//if(!session_is_registered(myusername)){
if(!$_SESSION['myusername']){
header("location:index.php");
}
include("../include/dbinfo.inc.php");
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
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
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

<br /><br /><br />

Welcome to the Footfall CRM system. 
<br /><br />
<table border="0">
<tr>
<td><form method="post" action="../adminmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
</tr>
</table>
<br />
<form method="post" action="backup_company_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Company table" /></form>
<form method="post" action="backup_contacts_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Contacts table" /></form>
<form method="post" action="backup_calls_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Calls table" /></form>
<form method="post" action="backup_attachments_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Attachments table" /></form>
<form method="post" action="backup_fclients_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup FClients table" /></form>
<form method="post" action="backup_users_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Users table" /></form>
<!--
<form method="post" action="backup_quotes_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Quotes table" /></form>
<form method="post" action="backup_orders_to_csv.php?id=<?echo $uid;?>"><input type="submit" value="Backup Orders table" /></form>
-->
</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
