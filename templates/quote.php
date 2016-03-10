<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
$url_contactid=$_GET['contactid'];
$url_companyid=$_GET['companyid'];
$url_uid = $_GET['uid'];
$url_quoteid = $_GET['quoteid'];
$url_salesperson = $_GET['sp'];
$url_project = $_GET['project'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM contact_quotes WHERE project='$url_project'"; // quoteid='$url_quoteid' 
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);

$query2 = "SELECT * FROM company_contact WHERE contactid='$url_contactid'";
$result2 = mysql_query($query2);

$query3 = "SELECT * FROM company WHERE cid='$url_companyid'";
$result3 = mysql_query($query3);

$query4 = "SELECT * FROM crmuser WHERE uid='$url_uid'";
$result4 = mysql_query($query4);

$query5 = "SELECT * FROM crmuser WHERE initials='$url_salesperson'";
$result5 = mysql_query($query5);

mysql_close();
/*
while ($row = mysql_fetch_array($result1)){
	$quoteid = $row['quoteid'];
	$companyid = $row['companyid'];
	$contactid = $row['contactid'];
	$salesperson = $row['salesperson'];
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
*/
while ($row = mysql_fetch_array($result2)){
	$contactid = $row['contactid'];
	$cid = $row['cid'];
	$company = $row['company'];
	$title = $row['title'];
	$cfirstname = $row['cfirstname'];
	$csurname = $row['csurname'];
	$position = $row['position'];
	$con_telephone = $row['telephone'];
	$mobile = $row['mobile'];
	$fax = $row['fax'];
	$email = $row['email'];
}

while ($row = mysql_fetch_array($result3)){
	$cid = $row['cid'];
	$company = $row['company'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
	$address3 = $row['address3'];
	$county = $row['county'];
	$com_telephone = $row['telephone'];
	$company_fax = $row['fax'];
	$company_email = $row['email'];
	$web = $row['web'];
	$indsec = $row['indsec'];
	$status = $row['status'];
}

while ($row = mysql_fetch_array($result4)){
	$uid = $row['uid'];
	$initials = $row['initials'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$username = $row['username'];
	$password = $row['password'];
	$user_telephone = $row['telephone'];
	$user_email = $row['email'];
	$role = $row['role'];
}

while ($row = mysql_fetch_array($result5)){
	$s_uid = $row['uid'];
	$s_initials = $row['initials'];
	$s_firstname = $row['firstname'];
	$s_lastname = $row['lastname'];
	$s_username = $row['username'];
	$s_password = $row['password'];
	$s_user_telephone = $row['telephone'];
	$s_email = $row['email'];
	$s_role = $row['role'];
}

//$total = $price1 + $price2 + $price3;
?>
<html>
<head>
<title>Footfall Quotation</title>
<!--<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>-->
<style type="text/css">
.buttons{
	text-align: right;
}

#page{
	width:595px;
/*	height: 940px; */ /* 842px; */
	margin-left:auto;
	margin-right:auto;
/*	border:solid; */
}
#company{
	font-family: arial, sans-serif;
	font-size: 22pt;
	font-weight: bold;
	margin-top: 20px;
	margin-right: 10px;
	text-align: right;
	color: #818181;
}
#address{
	clear: right;
	font-family: arial, sans-serif;
	font-size: 10pt;
	text-align: right;
	margin-right: 10px;
	color: #818181;
}

#ftl{
	font-family: verdana, sans-serif;
	font-size: 63pt;
	font-weight: bold;
/*	color: rgb(253,202,13); */
	color: rgb(51,51,51);
	margin-top: -130px;
	margin-left: 10px;
}
#contactdetails{
	font-family: arial, sans-serif;
	font-size: 11pt;
	margin-top: 30px;
	margin-left: 10px;
}

#subject{
	font-family: arial, sans-serif;
	font-size: 11pt;
	font-weight: bold;
	margin-top: 45px;
	margin-left: 10px;
}
#greeting{
	font-family: arial, sans-serif;
	font-size: 11pt;
	margin-top: 25px;
	margin-left: 10px;
}
.text{
	font-family: arial, sans-serif;
	font-size: 11pt;
	margin-left: 10px;
	margin-top: 15px;
}
#quotetable{
	width: 450px;
	margin-left: auto;
	margin-right: auto;
}
#quotetable th{
	font-weight: bold;
}

#footer{
/*	background: url(../images/footfall_bottom_letter.jpg) center no-repeat; */
	font-family: verdana, sans-serif;
	font-size: 8pt;
	text-align: right;
	padding-left: 10px;
	position: relative;
	bottom: -1px;/* -55px; */
	color: #818181;
	
	
}

#foot-head{
	text-align: right;
	margin-right: 180px;
	font-family: verdana, sans-serif;
	font-size: 11pt;
}
#foot-web{
	margin-top: 25px;
	margin-left: -110px;
	float: left;
	font-weight: bold;
	font-size: 11pt;
	font-family: arial, sans-serif;
	transform: rotate(90deg);
	-ms-transform: rotate(90deg); /* IE 9 */
	-moz-transform: rotate(90deg); /*Firefox */
	-webkit-transform: rotate(90deg); /* Safari and Chrome */
	-o-transform: rotate(90deg); /* Opera */
}
</style>

<script type="text/javascript" language="JavaScript">
function removeField1(){
	document.getElementById('extras1').innerHTML = "";
}
function removeField2(){
	document.getElementById('extras2').innerHTML = "";
}
function removeField3(){
	document.getElementById('extras3').innerHTML = "";
}
</script>

</head>
<body>
<div class="buttons">
<a href="javascript:window.print()">Print</a>
<!--<a href="quote_email.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $url_uid;?>&amp;sp=<?echo $salesperson;?>">Email</a>
<a href="quote_pdf.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $url_uid;?>&amp;sp=<?echo $url_salesperson;?>">PDF</a>
<a href="quote_word.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $url_uid;?>&amp;sp=<?echo $url_salesperson;?>">Word</a>-->
<!--<a href="export2doc.php?w=1&amp;DB_TBLName=contact_quotes&amp;quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">Word</a>-->
</div>

<div id="page">
<form name="quote" method="post" action="quote_word.php">
<input type="hidden" name="quoteid" value="<?php echo $url_quoteid;?>"/>
<input type="hidden" name="companyid" value="<?php echo $url_companyid;?>"/>
<input type="hidden" name="contactid" value="<?php echo $url_contactid;?>"/>
<input type="hidden" name="sp" value="<?php echo $url_salesperson;?>"/>
<input type="hidden" name="uid" value="<?php echo $url_uid;?>"/>
<input type="hidden" name="project" value="<?php echo $url_project;?>"/>
<!--<div id="logo"><h1>footfall</h1></div>-->
<div id="company"><img src="../images/footfall_logo.png" alt="Footfall logo" align="right" width="300" height="65" /></div>
<div id="address">
Footfall Ltd., Westlink Commercial Park, Oranmore, Galway<br />
t: 091 792500 t: 01 8035000 e: info@footfall.ie<br />
</div>
<!--<div id="ftl">FTL</div>-->

<div id="contactdetails">
<?php echo "{$title}&nbsp;{$cfirstname}&nbsp;{$csurname}";?><br />
<?php echo "{$address1}";?><br />
<?php echo "{$address2}";?><br />
<?php echo "{$address3}";?><br />
<!--<?php echo "{$com_telephone}";?><br />-->
<br />
</div>

<div id="subject">Re: Quotation for Footfall Matting – <?php echo $url_project;?></div>

<div id="greeting">Dear <?php echo "{$cfirstname}";?> ,</div>

<div class="text"><textarea cols="40" rows="3" name="custmsg">
Please enter message to customer...</textarea><br />
<br />
</div>
<div id="quotetable">
<table border="1" cellpadding="2" cellspacing="2">

<tr>
<th>Option</th>
<th>Description</th>
<th>Price</th>
</tr>

<?php
$i=0;
while ($i < $num1){
	$quoteid=mysql_result($result1,$i,"quoteid");
	$cid=mysql_result($result1,$i,"cid");
	$contactid=mysql_result($result1,$i,"contactid");
	$salesperson=mysql_result($result1,$i,"salesperson");
	$date=mysql_result($result1,$i,"date");
	$project=mysql_result($result1,$i,"project");
	$optionname=mysql_result($result1,$i,"optionname");
	$optiondesc=mysql_result($result1,$i,"optiondesc");
	$product=mysql_result($result1,$i,"product");
	$price=mysql_result($result1,$i,"price");
	$meterage=mysql_result($result1,$i,"meterage");
	$total=mysql_result($result1,$i,"total");
	$totalsupply=mysql_result($result1,$i,"totalsupply");
	$totalinstall=mysql_result($result1,$i,"totalinstall");

?>
<!--<p style="margin-left:10px;"><strong><u>Option:</u> <?echo $optionname;?></strong></p>-->

<tr>
<td><?php echo $optionname; ?></td>
<td><?php echo $optiondesc; ?></td>
<td>&euro;<?php echo $total; ?></td>
</tr>
<tr>
<td><select name="supplyinstallonly" id="supplyinstallonly"><option value="" selected="selected">Please Select</option><option value="Total supplied and installed ex VAT @ 13.5%:">Total supplied and installed ex VAT @ 13.5%:</option>
<option value="Total supply only ex VAT @ 23%:">Total supply only ex VAT @ 23%:</option></select></td>

<td><!--<div id="total"></div></td>-->
<td><select name="supplyinstallonlyvalue"><option value="" selected="selected">Please Select</option><option value="&euro;<?php echo $totalinstall; ?>">&euro;<?php echo $totalinstall; ?></option><option value="&euro;<?php echo $totalsupply; ?>">&euro;<?php echo $totalsupply; ?></option></select></td>
</tr>
<!--
<tr>
<td></td>
<td></td>
<td></td>
</tr>
-->
<br />
<?php
$i++;
}
?>


</table>
</div>
<div class="text">
<u>Extras:</u>
</div>
<div class="text" id="extras1">
<select name="extras1" id="extras1">
<option value="">Please Select</option><option value="Extra Labour costs">Extra Labour costs</option>
<option value="Door reduction">Door reduction</option><option value="Tile removal">Tile removal</option>
<option value="Subfloor reduction">Subfloor reduction</option><option value="Threshold strips">Threshold strips</option>
<option value="Screed">Screed</option><option value="Waste removal">Waste removal</option>
<option value="Removal and disposal of old mat">Removal and disposal of old mat</option><option value="Site visit">Site visit</option>
<option value="Labour">Labour</option><option value="Anchor bolts">Anchor bolts</option>
<option value="Adhesive/F3">Adhesive/F3</option><option value="Northern Ireland site charge">Northern Ireland site charge</option>
<option value="Milliken edging system in 400mm lengths">Milliken edging system in 400mm lengths</option>
<option value="Kuberit edging system in 2.7m lengths/price per linear meter">Kuberit edging system in 2.7m lengths/price per linear meter</option>
<option value="Matwell frame per linear meter">Matwell frame per linear meter</option>
<option value="Fixings for matwell frame">Fixings for matwell frame</option>
</select>
&euro;<input type="text" name="extras-price1" id="extras-price1" size="8"/>
<a href="#" onclick="removeField1()">X</a>
</div>
<div class="text" id="extras2">
<select name="extras2" id="extras2">
<option value="">Please Select</option><option value="Extra Labour costs">Extra Labour costs</option>
<option value="Door reduction">Door reduction</option><option value="Tile removal">Tile removal</option>
<option value="Subfloor reduction">Subfloor reduction</option><option value="Threshold strips">Threshold strips</option>
<option value="Screed">Screed</option><option value="Waste removal">Waste removal</option>
<option value="Removal and disposal of old mat">Removal and disposal of old mat</option><option value="Site visit">Site visit</option>
<option value="Labour">Labour</option><option value="Anchor bolts">Anchor bolts</option>
<option value="Adhesive/F3">Adhesive/F3</option><option value="Northern Ireland site charge">Northern Ireland site charge</option>
<option value="Milliken edging system in 400mm lengths">Milliken edging system in 400mm lengths</option>
<option value="Kuberit edging system in 2.7m lengths/price per linear meter">Kuberit edging system in 2.7m lengths/price per linear meter</option>
<option value="Matwell frame per linear meter">Matwell frame per linear meter</option>
<option value="Fixings for matwell frame">Fixings for matwell frame</option>
</select>
&euro;<input type="text" name="extras-price2" id="extras-price2" size="8"/>
<a href="#" onclick="removeField2()">X</a>
</div>
<div class="text" id="extras3">
<select name="extras3" id="extras3">
<option value="">Please Select</option><option value="Extra Labour costs">Extra Labour costs</option>
<option value="Door reduction">Door reduction</option><option value="Tile removal">Tile removal</option>
<option value="Subfloor reduction">Subfloor reduction</option><option value="Threshold strips">Threshold strips</option>
<option value="Screed">Screed</option><option value="Waste removal">Waste removal</option>
<option value="Removal and disposal of old mat">Removal and disposal of old mat</option><option value="Site visit">Site visit</option>
<option value="Labour">Labour</option><option value="Anchor bolts">Anchor bolts</option>
<option value="Adhesive/F3">Adhesive/F3</option><option value="Northern Ireland site charge">Northern Ireland site charge</option>
<option value="Milliken edging system in 400mm lengths">Milliken edging system in 400mm lengths</option>
<option value="Kuberit edging system in 2.7m lengths/price per linear meter">Kuberit edging system in 2.7m lengths/price per linear meter</option>
<option value="Matwell frame per linear meter">Matwell frame per linear meter</option>
<option value="Fixings for matwell frame">Fixings for matwell frame</option>
</select>
&euro;<input type="text" name="extras-price3" id="extras-price3" size="8"/>
<a href="#" onclick="removeField3()">X</a>
</div>

<div class="text"><textarea cols="40" rows="3" name="bulletpoint">
Additional bullet point info - please enter separated by a comma.
</textarea></div>
<br />
<div class="text">
If you have any further queries please do not hesitate to contact me.<br />
<br />
Kind regards,<br />
<br />
<?php echo "{$s_firstname}&nbsp;{$s_lastname}";?><br />
<?php echo "{$s_user_telephone}";?><br />

<input type="submit" name="submit" value="Save as Word document"/>
</form>
</div>

<div id="footer">
<div id="foot-web">www.footfall.ie</div>
<div id="foot-head">Footfall Ltd.</div><!-- Floor Safety &amp; Protection Systems -->
Directors: Malcolm Goodbody, Richard Mayne. <br />Company Reg: 413771 VAT Number 6433771V<br />
</div>
<img src="../images/footfall_bottom_letter.jpg" alt="Footfall" align="left" style="margin-left:-90px;" width="778" height="92"/>

</div>
</body>
</html>