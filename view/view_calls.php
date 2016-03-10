<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
$contactid=$_GET['contactid'];
$uid=$_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM contact_calls WHERE contactid='$contactid' ORDER BY date DESC";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);

mysql_close();


?>
<html>
<head><title>Footfall CRM</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
<center>
<!--<a href="../view/view_contacts.php?id=<?echo $contactid;?>">Back to contacts</a>-->
<b><center>View Calls</center></b><br><br>
<table border="1" cellpadding="0" cellspacing="0">
<tr>
<th><font face="Arial, Helvetica, sans-serif">Salesperson</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Action Taken</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date to call back</font></th>
<th><font face="Arial, Helvetica, sans-serif">Rank</font></th>
<th><font face="Arial, Helvetica, sans-serif">Value</font></th>
<th><font face="Arial, Helvetica, sans-serif">Appointment secured</font></th>
</tr>
<?php

$j=0;
while ($j < $num1) {
$callid=mysql_result($result1,$j,"callid");
$companyid=mysql_result($result1,$j,"companyid");
$contactid=mysql_result($result1,$j,"contactid");
$salesperson=mysql_result($result1,$j,"salesperson");
$date=mysql_result($result1,$j,"date");
$action=mysql_result($result1,$j,"action");
$callbackdate=mysql_result($result1,$j,"callbackdate");
$rank=mysql_result($result1,$j,"rank");
$value=mysql_result($result1,$j,"value");
$appointmentcheck=mysql_result($result1,$j,"appointmentcheck");

$datef = date("d/m/Y",strtotime($date));
$callbdatef = date("d/m/Y",strtotime($callbackdate));
?>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><?echo $salesperson;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $datef;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $action;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $callbdatef;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $rank;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $value;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $appointmentcheck;?></font></td>
<!--<td><font face="Arial, Helvetica, sans-serif"><a href="../delete/remove_call.php?uid=<?echo $uid;?>&amp;callid=<?echo $callid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $companyid;?>">Delete</a></font></td>-->
</tr>

<?php
$j++;
}
echo "</table>";
?>

</center>
</body>
</html>
