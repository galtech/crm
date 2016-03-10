<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");

$companyid=$_POST['companyid'];
$contactid=$_POST['contactid'];
$salesperson=$_POST['salesperson'];
$date=$_POST['date'];
$comments=$_POST['comments'];

$uid=$_POST['uid'];
$datef = date("Y/m/d",strtotime($date));

$file_name = $_FILES['ufile']['name'];
$path= "../uploads/".$file_name;

$file_data = $_FILES['ufile']['tmp_name'];
$size = $_FILES['ufile']['size'];
$type = $_FILES["ufile"]["type"];


$continue="../view/view_company.php?id=$cid";

if (copy($file_data, $path)){
	mysql_connect($server,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	$res_comments = mysql_real_escape_string($comments);
	
	$query = "INSERT INTO contact_files (fileid, companyid, contactid, salesperson, date, comments, file, filename, path, type, size) VALUES ('','$companyid','$contactid','$salesperson','$datef','$res_comments','$file_data','$file_name','$path','$type','$size')";
	mysql_query($query); 

	mysql_close();
}
/*
mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$datef = date("Y/m/d",strtotime($date));
$callbdatef = date("Y/m/d",strtotime($callbackdate));

$query = "INSERT INTO contact_calls VALUES ('','$companyid','$contactid','$salesperson','$datef','$action','$callbdatef','$rank','$value')";
mysql_query($query);

mysql_close();
*/
/*

$image_name = $_FILES['ufile']['name'];
$path= "uploads/".$image_name;

$image_data = $_FILES['ufile']['tmp_name'];
$size = $_FILES['ufile']['size'];
$type = $_FILES["ufile"]["type"];

if (copy($image_data, $path)){
	mysql_connect($server,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	$query = "INSERT INTO images (id, image, name, type, size) VALUES ('','$image_data','$path','$type','$size')";
	mysql_query($query); 

	mysql_close();
}

*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>'>
<!--<a href="../view/view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>">Click to continue</a>-->
<title>Attachment Added Successfully</title>
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
