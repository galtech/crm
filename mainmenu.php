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

$query2 = "SELECT * FROM company,contact_calls WHERE company.cid = contact_calls.companyid AND date < DATE_SUB(CURDATE(), INTERVAL 12 MONTH) AND status = 'Existing' AND date != '1970-01-01' LIMIT 6";
$result2 = mysql_query($query2);
$num2 = mysql_numrows($result2);

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

The following customers have not been contacted in 12 months

<br /><br /><br />
<!--
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td><form method="post" action="mainmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
<td><form method="post" action="search.php?id=<?echo $uid;?>"><input type="submit" value="Search" /></form></td>
<td><form method="post" action="salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form></td>
<td><form method="post" action="enquiries.php?id=<?echo $uid;?>"><input type="submit" value="Enquiries" /></form></td>
</tr>
</table>
-->

<table border="1" cellpadding="0" cellspacing="0">
<tr>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Company</font></th>
<th><font face="Arial, Helvetica, sans-serif">County</font></th>
<th><font face="Arial, Helvetica, sans-serif">Industry Sector</font></th>
<th><font face="Arial, Helvetica, sans-serif">Status</font></th>

</tr>

<?php

$k=0;
while ($k < $num2) {
$cid=mysql_result($result2,$k,"cid");
$company=mysql_result($result2,$k,"company");
$address1=mysql_result($result2,$k,"address1");
$address2=mysql_result($result2,$k,"address2");
$address3=mysql_result($result2,$k,"address3");
$county=mysql_result($result2,$k,"county");
$telephone=mysql_result($result2,$k,"telephone");
$fax=mysql_result($result2,$k,"fax");
$email=mysql_result($result2,$k,"email");
$web=mysql_result($result2,$k,"web");
$indsec=mysql_result($result2,$k,"indsec");
$status=mysql_result($result2,$k,"status");

$callid=mysql_result($result2,$k,"callid");
$companyid=mysql_result($result2,$k,"companyid");
$contactid=mysql_result($result2,$k,"contactid");
$salesperson=mysql_result($result2,$k,"salesperson");
$date=mysql_result($result2,$k,"date");
$action=mysql_result($result2,$k,"action");
$callbackdate=mysql_result($result2,$k,"callbackdate");
$rank=mysql_result($result2,$k,"rank");
$value=mysql_result($result2,$k,"value");

$datef = date("d/m/Y",strtotime($date));
$callbdatef = date("d/m/Y",strtotime($callbackdate));
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?echo $date;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $company;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $county;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $indsec;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $status;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="view/view_company.php?id=<?echo $cid;?>&amp;uid=<?echo $uid?>">View</a></font></td>

</tr>

<?php
$k++;
}
echo "</table>";
?>

<br /><br /><br />

Welcome to the Footfall CRM system. 
<br /><br /><br />

<form method="post" action="search.php?id=<?echo $uid;?>"><input type="submit" value="Search CRM"/></form>
<form method="post" action="add/add_company.php?id=<?echo $uid;?>"><input type="submit" value="Add Company"/></form>
<form method="post" action="salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form>
<!--<form method="post" action="enquiries.php?id=<?echo $uid;?>"><input type="submit" value="Enquiries" /></form>-->

</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
