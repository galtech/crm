<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
//if(!session_is_registered(myusername)){
if(!$_SESSION['myusername']){
header("location:index.php");
}
include("../include/dbinfo.inc.php");

$uid = $_GET['id'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);


$i=0;
while ($i < $num1) {
$ou_uid=mysql_result($result1,$i,"uid");
$initials=mysql_result($result1,$i,"initials");
$firstname=mysql_result($result1,$i,"firstname");
$lastname=mysql_result($result1,$i,"lastname");
$ou_username=mysql_result($result1,$i,"username");
$i++;
}

mysql_close();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
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
</div>

<div id="content">
<table border="0">
<tr>
<td><form method="post" action="../adminmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
</tr>
</table>

<b><center>User Sessions</center></b><br><br>

<table border="1" cellspacing="2" cellpadding="4" name="sessions">
<tr>
<th></th>
<th><font face="Arial, Helvetica, sans-serif">Initials</font></th>
<th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Last Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Username</font></th>
<th><font face="Arial, Helvetica, sans-serif">Role</font></th>
<th><font face="Arial, Helvetica, sans-serif">Logged In</font></th>
</tr>

<?php
mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query2 = "SELECT * FROM onlineusers ORDER BY loggedin DESC";
$result2 = mysql_query($query2);
$num2 = mysql_numrows($result2);

mysql_close();

$j=0;
while ($j < $num2) {
$ous_sid=mysql_result($result2,$j,"sid");
$ous_uid=mysql_result($result2,$j,"uid");
$ous_initials=mysql_result($result2,$j,"initials");
$ous_firstname=mysql_result($result2,$j,"firstname");
$ous_lastname=mysql_result($result2,$j,"lastname");
$ous_username=mysql_result($result2,$j,"username");
$ous_telephone=mysql_result($result2,$j,"telephone");
$ous_email=mysql_result($result2,$j,"email");
$ous_role=mysql_result($result2,$j,"role");
$ous_loggedin=mysql_result($result2,$j,"loggedin");

?>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><a href="../delete/delete_session.php?uid=<?echo $uid; ?>&amp;sid=<? echo $ous_sid; ?>">End Session</a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ous_initials; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ous_firstname; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ous_lastname; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ous_username; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ous_role; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ous_loggedin; ?></font></td>
</tr>

<?php
$j++;
}
echo "</table>";
?>


<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>

</body>
</html>
