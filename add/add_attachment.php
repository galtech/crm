<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}

include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
// $storeuser = $_GET['username'];
$contactid = $_GET['contactid'];
$companyid = $_GET['companyid'];
$uid = $_GET['uid'];
$curdate = date("d-m-Y");

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
<center>
<b><center>Add Attachment</center></b><br><br>

<form action="insert_attachment.php" method="post" enctype="multipart/form-data">
<table border="0">
<tr><td><input type="hidden" name="companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" readonly="readonly" value="<?echo $initials;?>" name="salesperson"/></td></tr>
<!--<select name="salesperson"><option>GH</option><option>MG</option>
<option>RM</option></select>-->
<tr><td>Date: </td><td><input type="text" value="<?echo $curdate;?>" name="date" size="50"/></td></tr>
<tr><td>Comments: </td><td><textarea name="comments" rows="6" cols="50"></textarea></td></tr>
<tr><td>Attachment: </td><td><input type="file" name="ufile" id="ufile" /> </td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>


</center>
</body>
</html>

