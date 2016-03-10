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
<b><center>Add Order</center></b><br><br>

<form action="insert_order.php" method="post">
<table border="0">
<tr><td><input type="hidden" name="companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" value="<?echo $initials;?>" name="salesperson"/></td></tr>
<tr><td>Date: </td><td><input type="text" value="<?echo $curdate;?>" name="date" size="50"/></td></tr>
<tr><td>PO Number: </td><td><input type="text" name="po" /></td></tr>
<tr><td>Project Name: </td><td><input type="text" name="project" size="50"/></td></tr>
<tr><td>Order placed by: </td><td><input type="text" name="orderplacedby" size="50"/></td></tr>
<tr><td>Order Details: </td><td><textarea name="orderdetail" rows="4" cols="50"></textarea></td></tr>
<tr><td>Invoice / Delivery / Site address: </td><td><textarea name="otherdetail" rows="4" cols="50">(if different)</textarea></td></tr>
<tr><td>Site Contact Name: </td><td><input type="text" name="sitename" size="50"/></td></tr>
<tr><td>Site Contact Telephone: </td><td><input type="text" name="sitephone" size="50"/></td></tr>
<tr><td>Site Contact Email: </td><td><input type="text" name="siteemail" size="50"/></td></tr>
<tr><td>Installation Date: </td><td><input type="text" name="installdate" size="50"/></td></tr>
<tr><td>Installation Time: </td><td><input type="text" name="installtime" size="50"/></td></tr>
<tr><td>Installer: </td><td><input type="text" name="installer" size="50"/></td></tr>
<tr><td>Documents required: </td><td><input type="text" name="documents" size="50" /></td></tr>
<tr><td>Job Details: </td><td><textarea name="jobdetail" rows="4" cols="50">* changes to job</textarea></td></tr>
<tr><td>Job Confirmation: </td><td><select name="jobconf" >
<option value=""></option>
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
<tr><td>Payment: </td><td><select name="payment" >
<option value=""></option>
<option value="Cash">Cash</option>
<option value="Cheque">Cheque</option>
<option value="Credit/Debit Card">Credit/Debit Card</option>
<option value="Paypal">Paypal</option>
</select>
</td></tr>
<tr><td>Invoice Number: </td><td><input type="text" name="invoiceno" /></td></tr>
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

