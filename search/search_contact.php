<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
$uid = @$_GET['uid'];

// get the search variable from the URL
$contactsearch = @$_GET['contactsearch'];
$trimmed = trim($contactsearch); // trim whitespace from stored variable

// rows return
$limit = 10;

// check for an empty string an display a message
if ($trimmed=="")
{
	echo "<link href='../css/style.css' rel='stylesheet' type='text/css' media='screen'/>";
	echo "<center><div id='wrapper'><div id='header'>";
	echo "<div id='logo'><h1>footfall</h1></div></div>";
	echo "<div id='content'><p>Please enter a search term</p>";
	echo "<a href='../search.php?id=$uid'>Back</a></div>";	
	echo "<div id='footer'><br />Footfall CRM 2.1 developed by <a href='http://www.peterheylin.com' target='_blank'>Peter Heylin</a> &copy; All Rights Reserved 2010-2012</div>";
	echo "</div></center>";
	exit;
}
// check for search parameter
if (!isset($contactsearch))
{
	echo "<link href='../css/style.css' rel='stylesheet' type='text/css' media='screen'/>";
	echo "<center><div id='wrapper'><div id='header'>";
	echo "<div id='logo'><h1>footfall</h1></div></div>";
	echo "<div id='content'><p>No search term found</p>";
	echo "<a href='../search.php?id=$uid'>Back</a></div>";	
	echo "<div id='footer'><br />Footfall CRM 2.1 developed by <a href='http://www.peterheylin.com' target='_blank'>Peter Heylin</a> &copy; All Rights Reserved 2010-2012</div>";	
	echo "</div></center>";
	exit;
}

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "SELECT * FROM company_contact WHERE cfirstname LIKE \"%$contactsearch%\" OR csurname LIKE \"%$contactsearch%\" OR cfirstname AND csurname LIKE \"%$contactsearch%\" ORDER BY company";
$result = mysql_query($query);
$num=mysql_numrows($result);

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
<table border="0">
<tr>
<td><form method="post" action="../mainmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
<td><form method="post" action="../search.php?id=<?echo $uid;?>"><input type="submit" value="Search" /></form></td>
<td><form method="post" action="../salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form></td>
</tr>
</table>

<b><center>Contact Search Results</center></b><br><br>

<table border="1" cellspacing="2" cellpadding="4" name="contacts">
<tr>
<th></th>
<th><font face="Arial, Helvetica, sans-serif">Company</font></th>
<th><font face="Arial, Helvetica, sans-serif">Contact</font></th>
<th><font face="Arial, Helvetica, sans-serif">Position</font></th>
<th><font face="Arial, Helvetica, sans-serif">Telephone</font></th>
<th><font face="Arial, Helvetica, sans-serif">Mobile</font></th>
<th><font face="Arial, Helvetica, sans-serif">E-mail</font></th>
</tr>
<!--

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
$j=0;
while ($j < $num) {

$contactid=mysql_result($result,$j,"contactid");
$companyid=mysql_result($result,$j,"cid");
$company=mysql_result($result,$j,"company");
$title=mysql_result($result,$j,"title");
$cfirst=mysql_result($result,$j,"cfirstname");
$clast=mysql_result($result,$j,"csurname");
$position=mysql_result($result,$j,"position");
$tel=mysql_result($result,$j,"telephone");
$mob=mysql_result($result,$j,"mobile");
$fax=mysql_result($result,$j,"fax");
$email=mysql_result($result,$j,"email");


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
<td><font face="Arial, Helvetica, sans-serif"><a href="../view/view_company.php?id=<? echo $companyid;?>&amp;uid=<?echo $uid;?>">View Company</a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $company; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $title." ".$cfirst." ".$clast; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $position; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $tel; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $mob; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $email; ?>"><? echo $email; ?></a></font></td>
</tr>

<?
$j++;
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

