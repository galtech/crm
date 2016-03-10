<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
$contactid=$_GET['contactid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM contact_files WHERE contactid='$contactid' ORDER BY date DESC";
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
<b><center>View Attachments</center></b><br><br>
<table border="1" cellpadding="0" cellspacing="0">
<tr>
<th><font face="Arial, Helvetica, sans-serif">Salesperson</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Comments</font></th>
<th><font face="Arial, Helvetica, sans-serif">File Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">File Type</font></th>
<th><font face="Arial, Helvetica, sans-serif"></font></th>
</tr>
<?php

$j=0;
while ($j < $num1) {
$fileid=mysql_result($result1,$j,"fileid");
$companyid=mysql_result($result1,$j,"companyid");
$contactid=mysql_result($result1,$j,"contactid");
$salesperson=mysql_result($result1,$j,"salesperson");
$date=mysql_result($result1,$j,"date");
$comments=mysql_result($result1,$j,"comments");
$file=mysql_result($result1,$j,"file");
$file_name=mysql_result($result1,$j,"filename");
$path=mysql_result($result1,$j,"path");
$type=mysql_result($result1,$j,"type");
$size=mysql_result($result1,$j,"size");

$datef = date("d/m/Y",strtotime($date));
?>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><?echo $salesperson;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $datef;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $comments;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="<?echo $path;?>"><?echo $file_name;?></a></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $type;?></font></td>
<!--<td><font face="Arial, Helvetica, sans-serif"><a href="../delete/remove_attachment.php?uid=<?echo $uid;?>&amp;fileid=<?echo $fileid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $companyid;?>">Delete</a></font></td>-->
</tr>

<?php
$j++;
}
echo "</table>";
?>

</center>
</body>
</html>
