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


<div id="wrapper">

<div id="content">

<b>View Company</b><br><br>

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

<a href="javascript:window.print()">Print Details</a>
<h2><?php echo $company; ?></h2><br />
<form name="companyresults">
<label>Sales Rep: </label><input type="text" size="50" readonly value="<? while($row = mysql_fetch_array($result4)) {echo $row['salesperson']; } ?>"/><br />
<label>Status:</label> <input type="text" size="50" readonly value="<? echo $status; ?>" /><br />
<label>Address 1:</label> <input type="text" size="50" readonly value="<? echo $add1; ?>"/><br />
<label>Address 2:</label> <input type="text" size="50" readonly value="<? echo $add2; ?>"/><br />
<label>Address 3:</label> <input type="text" size="50" readonly value="<? echo $add3; ?>"/><br />
<label>County: </label> <input type="text" size="50" readonly value="<? echo $county; ?>"/><br />
<label>Telephone:</label> <input type="text" size="50" readonly value="<? echo $tel; ?>"/><br />
<label>Facsimile: </label> <input type="text" size="50" readonly value="<? echo $fax; ?>"/><br />
<label>Email: </label> <input type="text" size="50" readonly value="<? echo $email; ?>"/><br />
<label>Web: </label> <input type="text" size="50" readonly value="<? echo $web; ?>"/><br />
<label>Industry Sector: </label><input type="text" size="50" readonly value="<? echo $indsec; ?>"/><br />
<label>How they heard about us?: </label><input type="text" size="50" readonly value="<? echo $source; ?>"/><br />
</form>
<?php
$j++;
}

?>
<!--
<a href="view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>" target="infoframe">Contacts</a><br />
<iframe name="infoframe" src="view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>" width="900" height="540">
<p>Your browser may need to be updated</p>
</iframe>
-->
</div>

</div>

</body>
</html>
