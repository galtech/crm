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
$salesperson = $_GET['sp'];
$orderid = $_GET['orderid'];
$curdate = date("d-m-Y");
$filedate = date("d-m-y");

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);
//$username = mysql_db_name($result1,$row['username']);
$query2 = "SELECT * FROM contact_orders WHERE orderid='$orderid'";
$result2 = mysql_query($query2);

while($row = mysql_fetch_array($result2)){
	$sql_orderid = $row['orderid'];
	$date = $row['date'];
	$po = $row['po'];
	$project = $row['project'];
	$orderplacedby = $row['orderplacedby'];
	$orderdetail = $row['orderdetail'];
	$otherdetail = $row['otherdetail'];
	$sitename = $row['sitename'];
	$sitephone = $row['sitephone'];
	$siteemail = $row['siteemail'];
	$installdate = $row['installdate'];
	$installtime = $row['installtime'];
	$installer = $row['installer'];
	$documents = $row['documents'];
	$jobdetail = $row['jobdetail'];
	$jobconf = $row['jobconf'];
//	$payment = $row['payment'];
//	$invoiceno = $row['invoiceno'];
}

$forderno = 'FS'.date('y');

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
<b><center>Edit Order</center></b><br><br>

<form action="update_order.php" method="post">
<table border="0">
<tr><td><input type="hidden" name="ud_companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="ud_contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="ud_orderid" value="<?echo $sql_orderid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="uid" value="<?echo $uid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" value="<?echo $salesperson;?>" name="ud_salesperson"/></td></tr>
<tr><td>Date: </td><td><input type="text" value="<?echo $date;?>" name="ud_date" size="50"/></td></tr>
<tr><td>PO Number: </td><td><input type="text" value="<?echo $po;?>" name="ud_po" size="50"/></td></tr>
<tr><td>Project Name: </td><td><input type="text" name="ud_project" value="<?echo $project;?>" size="50"/></td></tr>
<tr><td>Order placed by: </td><td><input type="text" name="ud_orderplacedby" value="<?echo $orderplacedby;?>" size="50"/></td></tr>
<tr><td>Order Details: </td><td><textarea name="ud_orderdetail" rows="4" cols="50"><?echo $orderdetail;?></textarea></td></tr> 
<tr><td>Invoice / Delivery / Site address: </td><td><textarea name="ud_otherdetail" rows="4" cols="50"><?echo $otherdetail;?></textarea></td></tr> 
<tr><td>Site Contact Name: </td><td><input type="text" name="ud_sitename" value="<?echo $sitename;?>" size="50"/></td></tr>
<tr><td>Site Contact Telephone: </td><td><input type="text" name="ud_sitephone" value="<?echo $sitephone;?>" size="50"/></td></tr>
<tr><td>Site Contact Email: </td><td><input type="text" name="ud_siteemail" value="<?echo $siteemail;?>" size="50"/></td></tr>
<tr><td>Installation Date: </td><td><input type="text" name="ud_installdate" value="<?echo $installdate;?>" size="50"/></td></tr>
<tr><td>Installation Time: </td><td><input type="text" name="ud_installtime" value="<?echo $installtime;?>" size="50"/></td></tr>
<tr><td>Installer: </td><td><input type="text" name="ud_installer" value="<?echo $supply;echo $installer;?>" size="50" /></td></tr>
<tr><td>Documents Required: </td><td><input type="text" name="ud_documents" value="<?echo $documents;?>" size="50"/></td></tr>
<tr><td>Job Details: </td><td><textarea name="ud_jobdetail" rows="4" cols="50"><?echo $jobdetail;?></textarea></td></tr> 
<tr><td>Job Confirmation: </td><td>
<select name="ud_jobconf" >
<option value="<?echo $jobconf;?>" selected="selected"><?echo $jobconf;?></option>
<option value="Pink Docket">Pink Docket</option>
<option value="Tracking Label">Tracking Label</option>
<option value="Delivery Note">Delivery Note</option>
<option value="GRN">GRN</option>
</select>
</td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>

<!--
<tr><td>Payment: </td><td>
<select name="ud_payment" >
<option value="<?echo $payment;?>" selected="selected"><?echo $payment;?></option>
<option value="Cash">Cash</option>
<option value="Cheque">Cheque</option>
<option value="Credit/Debit Card">Credit/Debit Card</option>
<option value="Paypal">Paypal</option>
</select>
</td></tr>
<tr><td>Invoice Number: </td><td><input type="text" name="ud_invoiceno" value="<?echo $invoiceno;?>" size="50"/></td></tr>
-->

<!--
<?php
$myFile = "../files/templates/Footfall Quotation Template.dot";
$fh = fopen($myFile, 'w');
fwrite($fh, "Mr. Joe Bloggs\n");
fwrite($fh, "Some Company\n");
rename("../files/templates/Footfall Quotation Template.dot","../files/saved/Footfall Quotation - Company {$filedate}.doc");
fclose($fh);

?>
-->

</center>
</body>
</html>

