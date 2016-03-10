<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");

//require_once('../lib/tcpdf/config/lang/eng.php');
//require_once('../lib/tcpdf/tcpdf.php');

$url_contactid=$_POST['contactid'];
$url_companyid=$_POST['companyid'];
$url_uid = $_POST['uid'];
$url_quoteid = $_POST['quoteid'];
$url_salesperson = $_POST['sp'];
$url_project = $_POST['project'];
$custmsg = $_POST['custmsg'];
$extras1 = $_POST['extras1'];
$extras2 = $_POST['extras2'];
$extras3 = $_POST['extras3'];
$extrasprice1 = $_POST['extras-price1'];
$extrasprice2 = $_POST['extras-price2'];
$extrasprice3 = $_POST['extras-price3'];
$supplyinstallonly = $_POST['supplyinstallonly'];
//$supplyinstallonlyvalue = $_POST['supplyinstallonlyvalue'];
$bulletpoint = $_POST['bulletpoint'];
$bullets = explode(",", $bulletpoint);
$count_bullets = count($bullets);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Footfall_Quotation_".date('d.m.y').".doc");

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
	$desc1 = $row['desc1'];
	$price1 = $row['price1'];
	$desc2 = $row['desc2'];
	$price2 = $row['price2'];
	$desc3 = $row['desc3'];
	$price3 = $row['price3'];
	$supply = $row['supply'];
	$supplyinstall = $row['supplyinstall'];
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

$total = $price1 + $price2 + $price3;

echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<style type='text/css'>body{ font-family: arial, sans-serif; }</style>";
echo "</head>";
echo "<body>";

echo "<div style='margin-top:20px; margin-right:10px; color: #818181;text-align:right;'><img src='http://demo.peterheylin.com/footfall/footfallcrm/2.2/images/footfall_logo.png' alt='Footfall logo' width='300' height='65' /></div>
<div style='clear:right; text-align:right; margin-right:10px; color:#818181;font-size:10pt;'>
Footfall Ltd., Westlink Commercial Park, Oranmore, Galway<br />
t: 091 792500 t: 01 8035000 e: info@footfall.ie w: www.footfall.ie<br />
</div>
<br />
<div style='margin-top: 30px; margin-left: 10px;'>
".$title." ".$cfirstname." ".$csurname."<br />
".$address1."<br />
".$address2."<br />
".$address3."<br />

</div>
<p style='text-align:center;'><b>Re: Quotation for Footfall Matting - ".$url_project."</b></p>
<br />
<div style=''>Dear ".$cfirstname." ,</div>
<br />
<div style='margin-top:25px; margin-left:0px;'>
". $custmsg ."<br />
</div>
<br /><br />
<div style='text-align:center;'>
<table border='1' cellpadding='2' cellspacing='2'>
<tr>
<th><b>Option</b></th>
<th><b>Description</b></th>
<th><b>Price</b></th>
</tr>";

$i=0;
while ($i < $num1){
	$quoteid=mysql_result($result1,$i,'quoteid');
	$cid=mysql_result($result1,$i,'cid');
	$contactid=mysql_result($result1,$i,'contactid');
	$salesperson=mysql_result($result1,$i,'salesperson');
	$date=mysql_result($result1,$i,'date');
	$project=mysql_result($result1,$i,'project');
	$optionname=mysql_result($result1,$i,'optionname');
	$optiondesc=mysql_result($result1,$i,'optiondesc');
	$product=mysql_result($result1,$i,'product');
	$price=mysql_result($result1,$i,'price');
	$meterage=mysql_result($result1,$i,'meterage');
	$total=mysql_result($result1,$i,'total');
	$totalsupply=mysql_result($result1,$i,'totalsupply');
	$totalinstall=mysql_result($result1,$i,'totalinstall'); 

echo "
<tr>
<td>".$optionname."</td>
<td>".$optiondesc."</td>
<td>&euro;".$total."</td>
</tr>
<tr>
<td></td>
<td>" .$supplyinstallonly. "</td>
<td>&euro;" .$total. "</td>
</tr>
";

$i++;
}

echo "
</table>
</div>
<br />
<div style=''>
<u>Extras:</u>
</div>
<br />
<div style=''>
". $extras1. "&nbsp;&euro;" .$extrasprice1. "<br />
". $extras2. "&nbsp;&euro;" .$extrasprice2. "<br />
". $extras3. "&nbsp;&euro;" .$extrasprice3. "<br />
</div>
<br /><br />
<ul>";
$i = 0;
while ($i < $count_bullets){
	echo "<li>" .$bullets[$i]. "</li>";
	$i++;
}
echo "</ul>
<br /><br />
<div style=''>
If you have any further queries please do not hesitate to contact me.<br />
<br />
Kind regards,<br />
<br />
".$s_firstname." ".$s_lastname."<br />
".$s_user_telephone."<br />
</div>";

echo "<div style='font-family:verdana, sans-serif; font-size:8pt; color:#818181;'>";
//<div style='margin-top: 25px; margin-left: -90px; float: left; font-weight:bold; font-size:11pt; font-family: arial, sans-serif; transform:rotate(90deg);'>www.footfall.ie</div>
//<div style='font-family:verdana, sans-serif; font-size:11pt; text-align:right; margin-right:180px;'>Footfall Ltd.</div>
echo "<div style='position: relative;text-align: center;bottom: -1px;'>Directors: Malcolm Goodbody, Richard Mayne. Company Reg: 413771 VAT Number 6433771V</div>
</div>";
// <br />  <img src='http://demo.peterheylin.com/footfall/footfallcrm/2.2/images/footfall_bottom_letter.jpg' alt='Footfall' align='left' style='margin-left:-90px;' width='778' height='92'/>";

echo "</body>";
echo "</html>";

// create some HTML content
/*
$html = '<div style="font-size:22pt; font-weight:bold; margin-top:20px; margin-right:10px; text-align:right; color: #818181;"><b>Footfall Ltd</b></div>
<div style="text-align:right; margin-right:10px; color:#818181;">
Westlink Commercial Park<br />
Oranmore<br />
Galway<br />
091 792500<br />
01 8035000<br />
info@footfall.ie<br />
www.footfall.ie<br />
</div>
<br />
<div style="margin-top: 30px; margin-left: 10px;">
'.$title.' '.$cfirstname.' '.$csurname.'<br />
'.$address1.'<br />
'.$address2.'<br />
'.$address3.'<br />
'.$com_telephone.'<br />
</div>
<p style="text-align:center;"><b>Re: Quotation for Footfall Matting - '.$project.'</b></p>
<br />
<div style="">Dear '.$cfirstname.' ,</div>
<br />
<div style="margin-top:25px; margin-left:10px;">
Thank you for <i>your enquiry/meeting with me/taking my call</i> in relation to the above. Please find below our quotation, as requested:<br />
</div>

<div style="">
<table border="1" cellpadding="2" cellspacing="2">
<tr>
<th><b>Option</b></th>
<th><b>Description</b></th>
<th><b>Price</b></th>
</tr>
<tr>
<td>'.$optionname.'</td>
<td>'.$optiondesc.'</td>
<td>&euro;'.$total.'</td>
</tr>
<tr>
<td><select name="supplyinstallonly" id="supplyinstallonly" onchange=""><option value="" selected="selected">Please Select</option><option value="Total incl VAT @ 13.5%:">Total supplied and installed incl VAT @ 13.5%:</option>
<option value="Total incl VAT @ 23%:">Total supply only incl VAT @ 23%:</option></select></td>

<td><!--<div id="total"></div></td>-->
<td><select name="supplyinstallonlyvalue"><option value="" selected="selected">Please Select</option><option value="&euro;'.$totalinstall.'">&euro;'.$totalinstall.'</option><option value="&euro;'.$totalsupply.'">&euro;'.$totalsupply.'</option></select></td>
</tr>';


$html = 
'</table>
</div>

<div style="">
If you have any further queries please do not hesitate to contact me.<br />
<br />
Kind regards,<br />
<br />
'.$s_firstname.' '.$s_lastname.'<br />
'.$s_user_telephone.'<br />
</div>
<div style="font-family:verdana, sans-serif; font-size:8pt; color:#818181;">
<div style="font-family:verdana, sans-serif; font-size:11pt;">Floor Safety &amp; Protection Systems</div>
Directors: Malcolm Goodbody, Richard Mayne. Company Reg: 413771 VAT Number 6433771V
</div>
</div>';
*/
