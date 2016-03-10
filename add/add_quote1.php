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
$filedate = date("d-m-y");

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

<form action="add_quote2.php" method="post">
<table border="0">
<tr><td><input type="hidden" name="companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="uid" value="<?echo $uid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" value="<?echo $initials;?>" name="salesperson"/></td></tr>
<tr><td>Date: </td><td><input type="text" value="<?echo $curdate;?>" name="date" size="50"/></td></tr>
<tr><td>Project Name: </td><td><input type="text" name="project"/></td></tr>
<tr><td>Option Name: </td><td><input type="text" name="optionname"/></td></tr>
<tr><td>Option Description: </td><td><input type="text" name="optiondesc"/></td></tr>
<tr><td>Product:</td><td>
<select name="product">
<option value="" selected="selected"></option>
<option value="Coir">Coir</option>
<option value="Forma">Forma</option>
<option value="Prior">Prior</option>
</select>
</td></tr>
<tr><td>Price/m<sup>2</sup>: </td><td><input type="text" name="price"/></td></tr>
<tr><td>Meterage: </td><td><input type="text" name="meterage"/></td></tr>

<!--
<tr><td>Mat / Carpet Description: </td><td><input type="text" name="desc1" size="50"/></td>
<td>Price: </td><td><input type="text" name="price1" size="10"/></td></tr>
<tr><td>Frame (if required): </td><td><input type="text" name="desc2" size="50"/></td>
<td>Price: </td><td><input type="text" name="price2" size="10"/></td></tr>
<tr><td>Extras: </td><td><input type="text" name="desc3" size="50"/></td>
<td>Price: </td><td><input type="text" name="price3" size="10"/></td></tr>
<tr><td>Supply: </td><td><input type="checkbox" name="supply" value="Total Supplied ex. VAT @ 23%" /></td></tr>
<tr><td>Supply and Install: </td><td><input type="checkbox" name="supplyinstall" value="Total Supplied and Installed ex. VAT @ 13.5%" /></td></tr>
-->
<tr><td><input type="Submit" value="Calculate" /></td></tr>
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

