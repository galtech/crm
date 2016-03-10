<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}

include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
// $storeuser = $_GET['username'];
// $contactid = $_GET['contactid'];
// $companyid = $_GET['companyid'];
// $uid = $_GET['uid'];

$contactid = $_POST['contactid'];
$companyid = $_POST['companyid'];
$uid = $_POST['uid'];
$salesperson = $_POST['salesperson'];
$date = $_POST['date'];
$project = $_POST['project'];
$optionname = $_POST['optionname'];
$optiondesc = $_POST['optiondesc'];
$product = $_POST['product'];
$price = $_POST['price'];
$meterage = $_POST['meterage'];

$totalexvat = $price * $meterage;
$totalsupply = $totalexvat * 23.5 / 100 + $totalexvat;
$totalinstall = $totalexvat * 13 / 100 + $totalexvat;

//$curdate = date("d-m-Y");
//$filedate = date("d-m-y");

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
<b><center>Add Quote</center></b><br><br>

<form action="insert_quote.php" method="post">
<table border="0">
<tr><td><input type="hidden" name="companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="uid" value="<?echo $uid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" value="<?echo $salesperson; ?>" name="salesperson"/></td></tr>
<tr><td>Date: </td><td><input type="text" value="<?echo $date; ?>" name="date" size="50"/></td></tr>
<tr><td>Project Name: </td><td><input type="text" value="<? echo $project; ?>" name="project" size="50"/></td></tr>
<tr><td>Option Name: </td><td><input type="text" value="<? echo $optionname; ?>" name="optionname" size="50"/></td></tr>
<tr><td>Option Description: </td><td><input type="text" value="<? echo $optiondesc; ?>" name="optiondesc" size="50"/></td></tr>
<tr><td>Product:</td><td><input type="text" value="<? echo $product; ?>" name="product" size="50"/></td></tr>
<tr><td>Price/m<sup>2</sup>: </td><td><input type="text" value="<? echo $price; ?>" name="price"/></td></tr>
<tr><td>Meterage: </td><td><input type="text" value="<? echo $meterage; ?>" name="meterage"/></td></tr>
<tr><td>Total ex vat: </td><td><input type="text" value="<? echo $totalexvat; ?>" name="totalexvat"/></td></tr>
<tr><td>Total incl vat (supply only): </td><td><input type="text" value="<? echo $totalsupply; ?>" name="totalsupply"/></td></tr>
<tr><td>Total incl vat (supply and install): </td><td><input type="text" value="<? echo $totalinstall; ?>" name="totalinstall"/></td></tr>

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

