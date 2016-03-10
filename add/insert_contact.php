<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");


$cid=$_POST['cid'];
$company=$_POST['company'];
$title=$_POST['title'];
$first=$_POST['cfirstname'];
$last=$_POST['csurname'];
$position=$_POST['position'];
$tel=$_POST['telephone'];
$mob=$_POST['mobile'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$uid=$_POST['uid'];

$continue="../view/view_company.php?id=$cid";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

//$datef = date("Y/m/d",strtotime($date));
//$callbdatef = date("Y/m/d",strtotime($callback));
$res_company = mysql_real_escape_string($company);
$res_first = mysql_real_escape_string($first);
$res_last = mysql_real_escape_string($last);
$res_position = mysql_real_escape_string($position);

$query = "INSERT INTO company_contact VALUES ('','$cid','$res_company','$title','$res_first','$res_last','$res_position','$tel','$mob','$fax','$email')";
mysql_query($query);

mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_company.php?id=<?echo $cid;?>&amp;uid=<?echo $uid;?>'>
<title>Contact Added Successfully</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#ffffff" text="#000000">

<div>
<center>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
<br>Your entry has been saved successfully
<!--<p><a href="<?php print $continue; ?>">Click here to continue</a></p>-->

</center>
</div>

</body>
</html>
