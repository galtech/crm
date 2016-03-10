<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");

$companyid=$_POST['ud_companyid'];
$contactid=$_POST['ud_contactid'];
$orderid=$_POST['ud_orderid'];
$ud_salesperson=$_POST['ud_salesperson'];
$ud_date=$_POST['ud_date'];
$ud_po=$_POST['ud_po'];
$ud_project=$_POST['ud_project'];
$ud_orderplacedby=$_POST['ud_orderplacedby'];
$ud_orderdetail=$_POST['ud_orderdetail'];
$ud_otherdetail=$_POST['ud_otherdetail'];
$ud_sitename=$_POST['ud_sitename'];
$ud_sitephone=$_POST['ud_sitephone'];
$ud_siteemail=$_POST['ud_siteemail'];
$ud_installdate=$_POST['ud_installdate'];
$ud_installtime=$_POST['ud_installtime'];
$ud_installer=$_POST['ud_installer'];
$ud_documents=$_POST['ud_documents'];
$ud_jobdetail=$_POST['ud_jobdetail'];
$ud_jobconf=$_POST['ud_jobconf'];
//$ud_payment=$_POST['ud_payment'];
//$ud_invoiceno=$_POST['ud_invoiceno'];

$uid=$_POST['uid'];

$continue="../view/view_company.php?id=$cid";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$datef = date("Y/m/d",strtotime($ud_date));
// $callbdatef = date("Y/m/d",strtotime($callbackdate));

$query = "UPDATE contact_orders SET cid='$companyid',contactid='$contactid',salesperson='$ud_salesperson',date='$datef',po='$ud_po',project='$ud_project',orderplacedby='$ud_orderplacedby',orderdetail='$ud_orderdetail',otherdetail='$ud_otherdetail',sitename='$ud_sitename',sitephone='$ud_sitephone',siteemail='$ud_siteemail',installdate='$ud_installdate',installtime='$ud_installtime',installer='$ud_installer',documents='$ud_documents',jobdetail='$ud_jobdetail',jobconf='$ud_jobconf' WHERE orderid='$orderid'";
mysql_query($query);

mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_orders.php?companyid=<?echo $companyid;?>&amp;uid=<?echo $uid;?>&amp;contactid=<?echo $contactid;?>'>
<title>Order Updated Successfully</title>
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
