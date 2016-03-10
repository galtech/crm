<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:index.php");
}
include("../include/dbinfo.inc.php");


mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "SELECT * FROM customer GROUP BY company";
$result = mysql_query($query);

$num=mysql_numrows($result);

mysql_close();


?>
<html>
<head><title>Footfall CRM</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
<center>
<div id="wrapper">

<div id="header">
<div id="logo"><h1>footfall</h1></div>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
</div>
<div id="content">

<table border="0">
<tr>
<td><form method="link" action="../mainmenu.php"><input type="submit" value="Home" /></form></td>
<td><form method="link" action="../search.php"><input type="submit" value="Search" /></form></td>
<td><form method="link" action="../salesmenu.php"><input type="submit" value="Sales" /></form></td>
<td><form method="link" action="../logout.php"><input type="submit" value="Logout" /></form></td>
</tr>
</table>


<b><center>All Contacts</center></b><br><br>

<table border="1" cellspacing="2" cellpadding="4" name="contacts">
<tr>
<th></th>
<th></th>
<th></th>
<th><font face="Arial, Helvetica, sans-serif">SP</font></th>
<th><font face="Arial, Helvetica, sans-serif">Company</font></th>
<th><font face="Arial, Helvetica, sans-serif">County</font></th>
<th><font face="Arial, Helvetica, sans-serif">Contact</font></th>
<th><font face="Arial, Helvetica, sans-serif">Position</font></th>
<th><font face="Arial, Helvetica, sans-serif">Telephone</font></th>
<th><font face="Arial, Helvetica, sans-serif">Mobile</font></th>
<th><font face="Arial, Helvetica, sans-serif">E-mail</font></th>
</tr>
<!--
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Title</font></th>
<th><font face="Arial, Helvetica, sans-serif">Contact Firstname</font></th>
<th><font face="Arial, Helvetica, sans-serif">Contact Surname</font></th>
<th><font face="Arial, Helvetica, sans-serif">Position</font></th>
<th><font face="Arial, Helvetica, sans-serif">Industry Sector</font></th>
<th><font face="Arial, Helvetica, sans-serif">Address1</font></th>
<th><font face="Arial, Helvetica, sans-serif">Address2</font></th>
<th><font face="Arial, Helvetica, sans-serif">Address3</font></th>
<th><font face="Arial, Helvetica, sans-serif">County</font></th>
<th><font face="Arial, Helvetica, sans-serif">Fax</font></th>
<th><font face="Arial, Helvetica, sans-serif">Website</font></th>

<th><font face="Arial, Helvetica, sans-serif">Action Taken</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date to Callback</font></th>
<th><font face="Arial, Helvetica, sans-serif">Rank</font></th>
<th><font face="Arial, Helvetica, sans-serif">Value</font></th>
-->


<?
$i=0;
while ($i < $num) {

$id=mysql_result($result,$i,"id");
$sp=mysql_result($result,$i,"salesperson");
$date=mysql_result($result,$i,"date");
$company=mysql_result($result,$i,"company");
$title=mysql_result($result,$i,"title");
$cfirst=mysql_result($result,$i,"cfirstname");
$clast=mysql_result($result,$i,"csurname");
$position=mysql_result($result,$i,"position");
$indsec=mysql_result($result,$i,"indsec");
$add1=mysql_result($result,$i,"address1");
$add2=mysql_result($result,$i,"address2");
$add3=mysql_result($result,$i,"address3");
$county=mysql_result($result,$i,"county");
$tel=mysql_result($result,$i,"telephone");
$mob=mysql_result($result,$i,"mobile");
$fax=mysql_result($result,$i,"fax");
$email=mysql_result($result,$i,"email");
$web=mysql_result($result,$i,"web");
/*
$action=mysql_result($result,$i,"actiontaken");
$comments=mysql_result($result,$i,"comments");
$callback=mysql_result($result,$i,"callbackdate");
$rank=mysql_result($result,$i,"rank");
$value=mysql_result($result,$i,"value");
*/

// $id=$_GET['id'];
//echo "<b>$first $last</b><br>Phone: $phone<br>Mobile: $mobile<br>Fax: $fax<br>E-mail: $email<br>Web: $web<br><hr><br>";

?>

<tr>
<!--<form method="link" action="edit.php?id=<? echo $id;?>"><input type="submit" value="Edit" /></form>-->
<td><font face="Arial, Helvetica, sans-serif"><a href="add_call.php?id=<? echo $id;?>">Add Call</a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="view_calls.php?id=<? echo $id;?>">View Calls</a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="edit.php?id=<? echo $id;?>">View Customer</a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $sp; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $company; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $county; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $title." ".$cfirst." ".$clast; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $position; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $tel; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $mob; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $email; ?>"><? echo $email; ?></a></font></td>
</tr>

<?
$i++;
}
echo "</table>";
?>
</div>

<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>

