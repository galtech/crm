<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
//$user = session_is_registered(myusername);
$companyid=$_GET['id'];
$uid = $_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


$query2 = "SELECT * FROM company_contact WHERE cid='$companyid'";
$result2 = mysql_query($query2);
$num2 = mysql_numrows($result2);

mysql_close();


?>
<html>
<head><title>Footfall CRM</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
<center>
<b><center>View Contacts</center></b><br><br>
<table border="1" cellpadding="0" cellspacing="0">
<tr>
<th><font face="Arial, Helvetica, sans-serif">Title</font></th>
<th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Surname</font></th>
<th><font face="Arial, Helvetica, sans-serif">Position</font></th>
<th><font face="Arial, Helvetica, sans-serif">Telephone</font></th>
<th><font face="Arial, Helvetica, sans-serif">Mobile</font></th>
<th><font face="Arial, Helvetica, sans-serif">E-mail</font></th>
<th><font face="Arial, Helvetica, sans-serif">Edit</font></th>
<th><font face="Arial, Helvetica, sans-serif">Calls</font></th>
<th><font face="Arial, Helvetica, sans-serif">Files</font></th>
<th><font face="Arial, Helvetica, sans-serif">Quotes</font></th>
<th><font face="Arial, Helvetica, sans-serif">Orders</font></th>
<!--
<th><font face="Arial, Helvetica, sans-serif">Delete</font></th>
<th><font face="Arial, Helvetica, sans-serif">Calls</font></th>
<th><font face="Arial, Helvetica, sans-serif">Files</font></th>
<th><font face="Arial, Helvetica, sans-serif">Quotes</font></th>
<th><font face="Arial, Helvetica, sans-serif">Quotes</font></th>
<th><font face="Arial, Helvetica, sans-serif">Orders</font></th>
-->
</tr>


<?php

$k=0;
while ($k < $num2) {
$contactid=mysql_result($result2,$k,"contactid");
$cid=mysql_result($result2,$k,"cid");
$company=mysql_result($result2,$k,"company");
$title=mysql_result($result2,$k,"title");
$cfirstname=mysql_result($result2,$k,"cfirstname");
$csurname=mysql_result($result2,$k,"csurname");
$pos=mysql_result($result2,$k,"position");
$tel=mysql_result($result2,$k,"telephone");
$mob=mysql_result($result2,$k,"mobile");
$fax=mysql_result($result2,$k,"fax");
$email=mysql_result($result2,$k,"email");

?>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><?echo $title;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $cfirstname;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $csurname;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $pos;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $tel;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $mob;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $email;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><a href="../edit/edit_contact.php?id=<?echo $contactid;?>">Edit</a></font></td>
<!--
<td><font face="Arial, Helvetica, sans-serif"><a href="../delete/remove_contact.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $companyid;?>&amp;uid=<?echo $uid;?>">Delete</a></font></td>
-->
<td><font face="Arial, Helvetica, sans-serif"><a href="../view/view_calls.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">View </a></font> / <br />
<font face="Arial, Helvetica, sans-serif"><a href="../add/add_call.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">Add</a></font></td>

<td><font face="Arial, Helvetica, sans-serif"><a href="../view/view_attachments.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>">View</a></font> / <br />
<font face="Arial, Helvetica, sans-serif"><a href="../add/add_attachment.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">Add</a></font></td>

<td><font face="Arial, Helvetica, sans-serif"><a href="../view/view_quotes.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">View</a></font> / <br />
<font face="Arial, Helvetica, sans-serif"><a href="../add/add_quote1.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">Add</a></font></td>

<td><font face="Arial, Helvetica, sans-serif"><a href="../view/view_orders.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">View</a></font> / <br />
<font face="Arial, Helvetica, sans-serif"><a href="../add/add_order.php?contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>">Add</a></font></td>

</tr>
<!--
<img src="../images/telephone.png" alt="View Calls" title="View Calls" width="50" height="50"/>
<img src="../images/plus_sign.png" alt="Add Call" title="Add Call" width="50" height="37"/>
<img src="../images/file.png" alt="View Files" title="View Files" width="50" height="50"/>

<table border="1">
<tr><td>
Title: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $title; ?>"/><br /><br />
First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $cfirstname; ?>"/><br /><br />
Surname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $csurname; ?>"/><br /><br />
Position: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $pos; ?>"/><br /><br />
Telephone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="50" readonly value="<? echo $tel; ?>"/><br /><br />
Mobile: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $mob; ?>"/><br /><br />
Facsimile: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" readonly value="<? echo $fax; ?>"/><br /><br />
Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="50" readonly value="<? echo $email; ?>"/><br /><br />
</td></tr>
</table>
-->
<?php
$k++;
}
echo "</table>";
?>
</center>
</body>
</html>
