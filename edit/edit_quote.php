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
$quoteid = $_GET['quoteid'];
$curdate = date("d-m-Y");
$filedate = date("d-m-y");

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);
//$username = mysql_db_name($result1,$row['username']);
$query2 = "SELECT * FROM contact_quotes WHERE quoteid='$quoteid'";
$result2 = mysql_query($query2);

while($row = mysql_fetch_array($result2)){
	$date = $row['date'];
	$project = $row['project'];
	$optionname = $row['optionname'];
	$optiondesc = $row['optiondesc'];
	$product = $row['product'];
	$price = $row['price'];
	$meterage = $row['meterage'];
	$total = $row['total'];
	$totalsupply = $row['totalsupply'];
	$totalinstall = $row['totalinstall'];
}

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
<b><center>Edit Quote</center></b><br><br>

<form action="update_quote.php" method="post">
<table border="0">
<tr><td><input type="hidden" name="ud_companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="ud_contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="ud_quoteid" value="<?echo $quoteid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="uid" value="<?echo $uid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" value="<?echo $salesperson;?>" name="ud_salesperson"/></td></tr>
<tr><td>Date: </td><td><input type="text" value="<?echo $date;?>" name="ud_date" size="50"/></td></tr>
<tr><td>Name of Project: </td><td><input type="text" name="ud_project" value="<?echo $project;?>" size="50"/></td></tr>
<tr><td>Option Name: </td><td><input type="text" name="ud_optionname" value="<?echo $optionname;?>" size="50"/></td></tr>
<tr><td>Option Description: </td><td><input type="text" name="ud_optiondesc" value="<?echo $optiondesc;?>" size="50"/></td></tr>
<tr><td>Product: </td><td><input type="text" name="ud_product" value="<?echo $product;?>" size="50"/></td></tr>
<tr><td>Price: </td><td><input type="text" name="ud_price" value="<?echo $price;?>" size="50" /></td></tr>
<tr><td>Meterage: </td><td><input type="text" name="ud_meterage" value="<?echo $meterage;?>" size="50"/></td></tr>
<tr><td>Total ex vat: </td><td><input type="text" name="ud_total" value="<?echo $total;?>" size="50"/></td></tr>
<tr><td>Total incl vat (supply only): </td><td><input type="text" name="ud_totalsupply" value="<?echo $totalsupply;?>" size="50"/></td></tr>
<tr><td>Total incl vat (supply &amp; install): </td><td><input type="text" name="ud_totalinstall" value="<?echo $totalinstall;?>" size="50"/></td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>

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

