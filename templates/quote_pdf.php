<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
require_once('../lib/tcpdf/config/lang/eng.php');
require_once('../lib/tcpdf/tcpdf.php');

$url_contactid=$_GET['contactid'];
$url_companyid=$_GET['companyid'];
$url_uid = $_GET['uid'];
$url_quoteid = $_GET['quoteid'];
$url_salesperson = $_GET['sp'];
$url_project = $_GET['project'];

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

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Footfall');
$pdf->SetTitle('Footfall Quotation');
$pdf->SetSubject('Footfall Quotation');
$pdf->SetKeywords('footfall, PDF, quote, customer, potential');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.$quote_id, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// add font
$fontname = $pdf->addTTFfont('../lib/tcpdf/fonts/myfonts/arial.ttf', 'TrueTypeUnicode', '', 32);

// set font
$pdf->SetFont('arial', '', 11);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
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

';

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

$html = 
'<div style="">
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

$i++;
}

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

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('Footfall Quotation.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+