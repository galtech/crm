<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
$contactid=$_GET['contactid'];
$companyid=$_GET['companyid'];
$uid = $_GET['uid'];
$quoteid = $_GET['quoteid'];
$salesperson = $_GET['sp'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM contact_quotes WHERE quoteid='$quoteid'";
$result1 = mysql_query($query1);
//$num1 = mysql_numrows($result1);

$query2 = "SELECT * FROM company_contact WHERE contactid='$contactid'";
$result2 = mysql_query($query2);

$query3 = "SELECT * FROM company WHERE cid='$companyid'";
$result3 = mysql_query($query3);

$query4 = "SELECT * FROM crmuser WHERE uid='$uid'";
$result4 = mysql_query($query4);

$query5 = "SELECT * FROM crmuser WHERE initials='$salesperson'";
$result5 = mysql_query($query5);

mysql_close();

while ($row = mysql_fetch_array($result1)){
	$quoteid = $row['quoteid'];
	$companyid = $row['companyid'];
	$contactid = $row['contactid'];
	$salesperson = $row['salesperson'];
	$date = $row['date'];
	$project = $row['project'];
	$desc1 = $row['desc1'];
	$price1 = $row['price1'];
	$desc2 = $row['desc2'];
	$price2 = $row['price2'];
	$desc3 = $row['desc3'];
	$price3 = $row['price3'];
	$supply = $row['supply'];
	$supplyinstall = $row['supplyinstall'];
}

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

$total = $price1 + $price2 + $price3;
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
	height:842px;
	margin-left:auto;
	margin-right:auto;
	border:solid;"
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
	font-family: arial, sans-serif;
	font-size: 11pt;
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
	font-family: verdana, sans-serif;
	font-size: 8pt;
	padding-left: 10px;
	position: relative;
	bottom: -55px;
	color: #818181;
	
	
}

#foot-head{
	font-family: verdana, sans-serif;
	font-size: 11pt;
}
</style>
</head>
<body>
<div class="buttons">
<a href="javascript:window.print()">Print</a>
<a href="quote_email.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">Email</a>
<a href="quote_pdf.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">PDF</a>
<!--<a href="export2doc.php?w=1&amp;DB_TBLName=contact_quotes&amp;quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">Word</a>-->
</div>
<div id="page">
<!--<div id="logo"><h1>footfall</h1></div>-->
<div id="company">Footfall Ltd</div>
<div id="address">
Westlink Commercial Park<br />
Oranmore<br />
Galway<br />
091 792500<br />
01 8035000<br />
info@footfall.ie<br />
www.footfall.ie<br />
</div>
<!--<div id="ftl">FTL</div>-->

<div id="contactdetails">
<?php echo "{$title}&nbsp;{$cfirstname}&nbsp;{$csurname}";?><br />
<?php echo "{$address1}";?><br />
<?php echo "{$address2}";?><br />
<?php echo "{$address3}";?><br />
<?php echo "{$com_telephone}";?><br />
<br />
</div>

<div id="subject">Re: Quotation for Footfall Matting � <?php echo $project;?></div>

<div id="greeting">Dear <?php echo "{$cfirstname}";?> ,</div>

<div class="text">
Thank you for <i>your enquiry/meeting with me/taking my call</i> in relation to the above. Please find below our quotation, as requested:<br />
<br />
</div>

<div id="quotetable">
<table border="1" cellpadding="2" cellspacing="2">
<tr>
<th>Description</th>
<th>Price</th>
</tr>
<tr>
<td><?php echo $desc1; ?></td>
<td><?php echo $price1; ?></td>
</tr>
<tr>
<td><?php echo $desc2; ?></td>
<td><?php echo $price2; ?></td>
</tr>
<tr>
<td><?php echo $desc3; ?></td>
<td><?php echo $price3; ?></td>
</tr>
<tr>
<td><?php echo $supply; echo $supplyinstall; ?></td>
<td><?php echo $total; ?></td>
</tr>
</table>
</div>

<div class="text">
If you have any further queries please do not hesitate to contact me.<br />
<br />
Kind regards,<br />
<br />
<?php echo "{$s_firstname}&nbsp;{$s_lastname}";?><br />
<?php echo "{$s_user_telephone}";?><br />

</div>

<div id="footer">
<div id="foot-head">Floor Safety &amp; Protection Systems</div>
<p>Directors: Malcolm Goodbody, Richard Mayne. Company Reg: 413771 VAT Number 6433771V</p>
</div>

</div>
</body>
</html>