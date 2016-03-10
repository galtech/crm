<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
$companyid=$_GET['id'];
$uid = $_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM company WHERE cid='$companyid'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);

$query2 = "SELECT * FROM company_contact WHERE cid='$companyid'";
$result2 = mysql_query($query2);
$num2 = mysql_numrows($result2);

$query3 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result3 = mysql_query($query3);
$num3 = mysql_numrows($result3);
//$username = mysql_db_name($result1,$row['username']);

$query4 = "SELECT * FROM company_fclients WHERE companyid='$companyid'";
$result4 = mysql_query($query4);
$num4 = mysql_numrows($result4);

$i=0;
while ($i < $num3) {
$uid=mysql_result($result3,$i,"uid");
$initials=mysql_result($result3,$i,"initials");
$firstname=mysql_result($result3,$i,"firstname");
$lastname=mysql_result($result3,$i,"lastname");
$username=mysql_result($result3,$i,"username");
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


<b><center>View Company</center></b><br><br>

<?php

$j=0;
while ($j < $num1) {
$id=mysql_result($result1,$j,"cid");
$company=mysql_result($result1,$j,"company");
$add1=mysql_result($result1,$j,"address1");
$add2=mysql_result($result1,$j,"address2");
$add3=mysql_result($result1,$j,"address3");
$county=mysql_result($result1,$j,"county");
$tel=mysql_result($result1,$j,"telephone");
$fax=mysql_result($result1,$j,"fax");
$email=mysql_result($result1,$j,"email");
$web=mysql_result($result1,$j,"web");
$indsec=mysql_result($result1,$j,"indsec");
$status=mysql_result($result1,$j,"status");
$source=mysql_result($result1,$j,"source");

?>

<a href="../edit/edit_company.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>">Edit Company</a>
<a href="../add/add_contact.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>">Add Contact</a>
<a href="../add/assign_salesperson.php?companyid=<?echo $companyid; ?>&amp;uid=<?echo $uid;?>">Assign to Salesperson</a>
<a href="javascript:window.print()">Print Details</a>
<h2><?php echo $company; ?></h2><br />
Sales Rep: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? while($row = mysql_fetch_array($result4)) {echo $row['salesperson']; } ?>"/><br /><br />
Status: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $status; ?>"/><br /><br />
<br /><br />
Address 1: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $add1; ?>"/><br /><br />
Address 2: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $add2; ?>"/><br /><br />
Address 3: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $add3; ?>"/><br /><br />
County: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="50" readonly value="<? echo $county; ?>"/><br /><br />
Telephone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $tel; ?>"/><br /><br />
Facsimile: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $fax; ?>"/><br /><br />
Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="50" readonly value="<? echo $email; ?>"/><br /><br />
Web: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="50" readonly value="<? echo $web; ?>"/><br /><br />
Industry Sector: <input type="text" size="50" readonly value="<? echo $indsec; ?>"/><br /><br />
How they heard about us?: <input type="text" size="50" readonly value="<? echo $source; ?>"/><br /><br />
<?php
$j++;
}

?>
<a href="view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>" target="infoframe">Contacts</a><br />
<iframe name="infoframe" src="view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>" width="900" height="540">
<p>Your browser may need to be updated</p>
</iframe>

</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
