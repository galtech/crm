<?
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// include("../include/functions.php");

$uid = $_POST['id'];

// get the search variable from the URL
// $salesperson = @$_GET['salesperson'];
$salesperson = $_POST['salesperson'];
$date_from = $_POST['activitydatefrom'];
$date_to = $_POST['activitydateto'];

$start_number = 0;
$items_per_page = 3;

$format_date_from = date("Y/m/d",strtotime($date_from));
$format_date_to = date("Y/m/d",strtotime($date_to));

// $trimmed = trim($salesperson); // trim whitespace from stored variable

// rows return
/*

$limit = 10;

// check for an empty string an display a message
if ($trimmed=="")
{
	echo "<p>Please enter a search term</p>";
	echo "<a href='../salesmenu.php?id=$uid'>Back</a>";	
	exit;
}
// check for search parameter
if (!isset($salesperson))
{
	echo "<p>No search term found</p>";
	echo "<a href='../salesmenu.php?id=$uid'>Back</a>";	
	exit;
}

*/
mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "SELECT * FROM contact_calls,company WHERE contact_calls.companyid = company.cid AND salesperson LIKE \"%$salesperson%\" AND contact_calls.date BETWEEN '$format_date_from' AND '$format_date_to' ORDER BY contact_calls.date DESC"; // LIMIT $start_number, $items_per_page";

//$query = "SELECT * FROM contact_calls,company WHERE contact_calls.salesperson LIKE \"%$salesperson%\" AND contact_calls.companyid = company.cid AND contact_calls.date != '0000-00-00' AND contact_calls.date BETWEEN CURRENT_DATE() AND (CURRENT_DATE() - INTERVAL 7 DAY) ORDER BY contact_calls.date DESC";
$result = mysql_query($query);
$count=mysql_numrows($result);

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
<style type="text/css">
@media print{
  body * {
    visibility:hidden;
  }
  #section_to_print, #section_to_print * {
    visibility:visible;
  }
  #section_to_print {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>

</head>
<body>
<p>You are logged in as <b><?echo $firstname." ".$lastname." ";?></b><a href="../logout.php?uid=<?echo $uid;?>">Logout</a></p>

<center>
<div id="wrapper">
<div id="header">
<div id="logo"><h1>footfall</h1></div>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
</div>
<div id="content">
<table border="0">
<tr>
<td><form method="post" action="../mainmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
<td><form method="post" action="../search.php?id=<?echo $uid;?>"><input type="submit" value="Search" /></form></td>
<td><form method="post" action="../salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form></td>
</tr>
</table>

<b><center>Sales Activity Search Results</center></b><br/>
<div id="section_to_print"> <!-- start print area -->
<p style="font-size:8pt;">Rank Key: <b>1</b> - 6 months / <b>2</b> - 1 month / <b>3</b> - 2 weeks / <b>4</b> - 1 week / <b>5</b> - 3 days / <b>6</b> - 1 day / <b>7</b> - quote issued / <b>8</b> - po received | <a href="javascript:window.print()">Print</a></p>
<table border="1" cellspacing="1" cellpadding="1" name="contacts">
<tr>
<th><font face="Arial, Helvetica, sans-serif" size="2">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif" size="2">SP</font></th>
<th><font face="Arial, Helvetica, sans-serif" size="2">Company</font></th>
<th><font face="Arial, Helvetica, sans-serif" size="2">County</font></th>
<!--<th><font face="Arial, Helvetica, sans-serif">Telephone</font></th>-->
<th><font face="Arial, Helvetica, sans-serif" size="2">Action</font></th>
<th><font face="Arial, Helvetica, sans-serif" size="2">Call Back Date</font></th>
<th><font face="Arial, Helvetica, sans-serif" size="2">Rank</font></th>
<th><font face="Arial, Helvetica, sans-serif" size="2">Value</font></th>
<!--<th><font face="Arial, Helvetica, sans-serif">Appointment Secured</font></th>-->
</tr>

<?
$j=0;
while ($j < $count) {

$callid=mysql_result($result,$j,"callid");
$companyid=mysql_result($result,$j,"companyid");
$contactid=mysql_result($result,$j,"contactid");
$salesperson=mysql_result($result,$j,"salesperson");
$date=mysql_result($result,$j,"date");
$action=mysql_result($result,$j,"action");
$callbackdate=mysql_result($result,$j,"callbackdate");
$rank=mysql_result($result,$j,"rank");
$value=mysql_result($result,$j,"value");
$appointmentcheck=mysql_result($result,$j,"appointmentcheck");

$company_cid=mysql_result($result,$j,"cid");
$company_company=mysql_result($result,$j,"company");
$company_address1=mysql_result($result,$j,"address1");
$company_address2=mysql_result($result,$j,"address2");
$company_address3=mysql_result($result,$j,"address3");
$company_county=mysql_result($result,$j,"county");
$company_tel=mysql_result($result,$j,"telephone");
$company_fax=mysql_result($result,$j,"fax");
$company_email=mysql_result($result,$j,"email");
$company_web=mysql_result($result,$j,"web");
$company_indsec=mysql_result($result,$j,"indsec");

$datef = date("d/m/Y",strtotime($date));
$callbdatef = date("d/m/Y",strtotime($callbackdate));
?>
<script type="text/javascript" language="JavaScript">
<!-- hide
function popwindow(){
	popup = window.open("../info_boxes/view_company.php?id=<? echo $companyid;?>","View Company","width=600,height=400","scrolling=yes");
}
// original link: ../view/view_company.php?id=<? echo $companyid;?>&amp;uid=<?echo $uid;?>

// end hide -->
</script>

<tr>
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $datef; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $salesperson; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif" size="2"><a href="../view/view_company.php?id=<? echo $companyid;?>&amp;uid=<?echo $uid;?>" ><? echo $company_company; ?></a></font></td>
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $company_county; ?></font></td>
<!--<td><font face="Arial, Helvetica, sans-serif"><? echo $company_tel; ?></font></td>-->
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $action; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $callbdatef; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $rank; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif" size="2"><? echo $value; ?></font></td>
<!--<td><font face="Arial, Helvetica, sans-serif"><? echo $appointmentcheck; ?></font></td>-->
</tr>

<?
$j++;
}
echo "</table>";
?>
</div><!-- end print area -->

</div>

<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>

</div>
</center>
</body>
</html>

