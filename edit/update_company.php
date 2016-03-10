<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
$ud_companyid=$_POST['ud_companyid'];
$ud_status=$_POST['ud_status'];
$ud_salesrep=$_POST['ud_salesrep'];
$ud_fclientid=$_POST['ud_fclientid'];
$ud_company=$_POST['ud_company'];
$ud_add1=$_POST['ud_address1'];
$ud_add2=$_POST['ud_address2'];
$ud_add3=$_POST['ud_address3'];
$ud_county=$_POST['ud_county'];
$ud_tel=$_POST['ud_telephone'];
$ud_fax=$_POST['ud_fax'];
$ud_email=$_POST['ud_email'];
$ud_web=$_POST['ud_web'];
$ud_indsec=$_POST['ud_indsec'];
$ud_source=$_POST['ud_source'];
$ud_uid=$_POST['ud_uid'];


include("../include/dbinfo.inc.php");

$continue="../view/view_company.php?id=$ud_companyid";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$res_udcompany = mysql_real_escape_string($ud_company);
$res_udadd1 = mysql_real_escape_string($ud_add1);
$res_udadd2 = mysql_real_escape_string($ud_add2);
$res_udadd3 = mysql_real_escape_string($ud_add3);

$query="UPDATE company SET company='$res_udcompany', address1='$res_udadd1', address2='$res_udadd2', address3='$res_udadd3', county='$ud_county', telephone='$ud_tel', fax='$ud_fax', email='$ud_email', web='$ud_web', indsec='$ud_indsec', status='$ud_status', source='$ud_source' WHERE cid='$ud_companyid'";
mysql_query($query);
// echo "Record Updated";


$query1="UPDATE company_fclients SET clientid='$ud_fclientid', salesperson='$ud_salesrep' WHERE companyid='$ud_companyid'";
mysql_query($query1);
mysql_close();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_company.php?id=<?echo $ud_companyid;?>&amp;uid=<?echo $ud_uid;?>'>
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
