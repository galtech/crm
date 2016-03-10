<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
$uid = $_GET['uid'];
$fileid = $_GET['fileid'];
$contactid = $_GET['contactid'];
$companyid = $_GET['companyid'];
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

//$datef = date("Y/m/d",strtotime($date));
//$callbdatef = date("Y/m/d",strtotime($callback));

$query = "DELETE FROM contact_files WHERE fileid='$fileid' LIMIT 1";
mysql_query($query);

/*
$id_query = "SELECT MAX(cid) FROM company"; // WHERE id = LAST_INSERT_ID() 
$id_query_result = mysql_query($id_query);   
$companyid = mysql_db_name($id_query_result,$row['cid']);
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
The attachment has been deleted successfully. <a href="../view/view_attachments.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">Click here to continue</a> 
<br /><br />

</center>

</body>
</html>
