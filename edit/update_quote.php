<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");

$companyid=$_POST['ud_companyid'];
$contactid=$_POST['ud_contactid'];
$quoteid=$_POST['ud_quoteid'];
$ud_salesperson=$_POST['ud_salesperson'];
$ud_date=$_POST['ud_date'];
$ud_project=$_POST['ud_project'];
$ud_optionname=$_POST['ud_optionname'];
$ud_optiondesc=$_POST['ud_optiondesc'];
$ud_product=$_POST['ud_product'];
$ud_price=$_POST['ud_price'];
$ud_meterage=$_POST['ud_meterage'];
$ud_total=$_POST['ud_total'];
$ud_totalsupply=$_POST['ud_totalsupply'];
$ud_totalinstall=$_POST['ud_totalinstall'];
$uid=$_POST['uid'];

$continue="../view/view_company.php?id=$cid";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$datef = date("Y/m/d",strtotime($ud_date));
// $callbdatef = date("Y/m/d",strtotime($callbackdate));

$query = "UPDATE contact_quotes SET cid='$companyid',contactid='$contactid',salesperson='$ud_salesperson',date='$datef',project='$ud_project',optionname='$ud_optionname',optiondesc='$ud_optiondesc',product='$ud_product',price='$ud_price',meterage='$ud_meterage',total='$ud_total',totalsupply='$ud_totalsupply',totalsupply='$ud_totalsupply' WHERE quoteid='$quoteid'";
mysql_query($query);

mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_quotes.php?companyid=<?echo $companyid;?>&amp;uid=<?echo $uid;?>&amp;contactid=<?echo $contactid;?>'>
<title>Quote Updated Successfully</title>
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
