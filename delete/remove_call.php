<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
$uid = $_GET['uid'];
$callid = $_GET['callid'];
$contactid = $_GET['contactid'];
$companyid = $_GET['companyid'];
//$userid = $_GET['userid'];

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
/*
$query2 = "SELECT * FROM contact_calls WHERE callid='$callid'";
$result2 = mysql_query($query2);
//$num2 = mysql_numrows($result2);

while($row = mysql_fetch_array($result2)){
	$usernames = $row['username'];
}
*/
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
<center>

<br />
Are you sure you want to remove call <?php echo $callid;?> <a href="../delete/delete_call.php?callid=<?php echo $callid;?>&amp;uid=<?php echo $uid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $companyid;?>">Click here to continue</a> 
<br /><br />

</center>
</body>
</html>
