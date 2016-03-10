<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
$ud_contactid=$_POST['ud_contactid'];
$ud_cid=$_POST['ud_cid'];
$ud_company=$_POST['ud_company'];
$ud_title=$_POST['ud_title'];
$ud_cfirstname=$_POST['ud_cfirstname'];
$ud_csurname=$_POST['ud_csurname'];
$ud_pos=$_POST['ud_pos'];
$ud_tel=$_POST['ud_telephone'];
$ud_mob=$_POST['ud_mobile'];
$ud_fax=$_POST['ud_fax'];
$ud_email=$_POST['ud_email'];
$ud_uid=$_POST['ud_uid'];


include("../include/dbinfo.inc.php");
$contactid=$_GET['id'];

$continue="../view/view_contacts.php?id=$ud_cid";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$res_udcfirstname = mysql_real_escape_string($ud_cfirstname);
$res_udcsurname = mysql_real_escape_string($ud_csurname);
$res_udpos = mysql_real_escape_string($ud_pos);

$query="UPDATE company_contact SET contactid='$ud_contactid', cid='$ud_cid', company='$ud_company', title='$ud_title', cfirstname='$res_udcfirstname', csurname='$res_udcsurname', position='$res_udpos', telephone='$ud_tel', mobile='$ud_mob', fax='$ud_fax', email='$ud_email' WHERE contactid='$ud_contactid'";
mysql_query($query);
// echo "Record Updated";
mysql_close();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_contacts.php?id=<?echo $ud_cid;?>'>
<title>Company Updated Successfully</title>
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
