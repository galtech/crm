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
$project=$_POST['project'];
$optionname = $_POST['optionname'];
$optiondesc = $_POST['optiondesc'];
$product = $_POST['product'];
$price = $_POST['price'];
$meterage = $_POST['meterage'];
$totalexvat=$_POST['totalexvat'];
$totalsupply=$_POST['totalsupply'];
$totalinstall=$_POST['totalinstall'];

$uid=$_POST['uid'];

// $continue="../view/view_company.php?id=$cid";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$datef = date("Y/m/d",strtotime($date));
// $callbdatef = date("Y/m/d",strtotime($callbackdate));

$query = "INSERT INTO contact_quotes VALUES ('','$companyid','$contactid','$salesperson','$datef','$project','$optionname','$optiondesc','$product','$price','$meterage','$totalexvat','$totalsupply','$totalinstall')";
mysql_query($query);

mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv='refresh' content='0;url=../view/view_contacts.php?id=<?echo $companyid;?>&amp;uid=<?echo $uid;?>'>
<title>Quote Added Successfully</title>
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
