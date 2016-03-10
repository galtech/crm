<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $continue="../mainmenu.php";
$uid = $_GET['id'];

$status=$_POST['status'];
$company=$_POST['company'];
$indsec=$_POST['indsec'];
$add1=$_POST['address1'];
$add2=$_POST['address2'];
$add3=$_POST['address3'];
$county=$_POST['county'];
$tel=$_POST['telephone'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$web=$_POST['web'];
$source=$_POST['source'];
$uid=$_POST['uid'];

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

//$datef = date("Y/m/d",strtotime($date));
//$callbdatef = date("Y/m/d",strtotime($callback));
$res_company = mysql_real_escape_string($company);
$res_add1 = mysql_real_escape_string($add1);
$res_add2 = mysql_real_escape_string($add2);
$res_add3 = mysql_real_escape_string($add3);

$query = "INSERT INTO company VALUES ('','$res_company','$res_add1','$res_add2','$res_add3','$county','$tel','$fax','$email','$web','$indsec','$status','$source')";
mysql_query($query);

$id_query = "SELECT MAX(cid) FROM company"; // WHERE id = LAST_INSERT_ID() 
$id_query_result = mysql_query($id_query);   
$companyid = mysql_db_name($id_query_result,$row['cid']);

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
<td><form method="post" action="../mainmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
<td><form method="post" action="../search.php?id=<?echo $uid;?>"><input type="submit" value="Search" /></form></td>
<td><form method="post" action="../salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form></td>
</tr>
</table>
<br />
The company has been saved successfully. <a href="add_contact.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>">Would you like to add a contact?</a> 
<br /><br />
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>

</body>
</html>
