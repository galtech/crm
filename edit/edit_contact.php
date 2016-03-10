<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
//$continue="http://footfall.peterheylin.ie";
//$companyid=$_GET['id'];
$contactid=$_GET['id'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query2 = "SELECT * FROM company_contact WHERE contactid='$contactid'";
$result2 = mysql_query($query2);
$num2 = mysql_numrows($result2);

mysql_close();

?>
<html>
<head><title>Footfall CRM</title></head>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<b><center>Edit Contact</center></b><br><br>

<?php

$j=0;
while ($j < $num2) {
$contactid=mysql_result($result2,$j,"contactid");
$cid=mysql_result($result2,$j,"cid");
$company=mysql_result($result2,$j,"company");
$title=mysql_result($result2,$j,"title");
$cfirstname=mysql_result($result2,$j,"cfirstname");
$csurname=mysql_result($result2,$j,"csurname");
$pos=mysql_result($result2,$j,"position");
$tel=mysql_result($result2,$j,"telephone");
$mob=mysql_result($result2,$j,"mobile");
$fax=mysql_result($result2,$j,"fax");
$email=mysql_result($result2,$j,"email");

?>

<!--
<form action="update-db.php" method="post">
<input type="hidden" name="ud_id" value="<? echo $id; ?>">
First Name: <input type="text" name="ud_first" value="<? echo $first; ?>"><br>
Last Name: <input type="text" name="ud_last" value="<? echo $last; ?>"><br>
Phone Number: <input type="text" name="ud_phone" value="<? echo $phone; ?>"><br>
Mobile Number: <input type="text" name="ud_mobile" value="<? echo $mobile; ?>"><br>
Fax Number: <input type="text" name="ud_fax" value="<? echo $fax; ?>"><br>
E-mail Address: <input type="text" name="ud_email" value="<? echo $email; ?>"><br>
Web Address: <input type="text" name="ud_web" value="<? echo $web; ?>"><br>
<input type="Submit" value="Save">
</form>
-->

<form action="update_contact.php" method="post">
<table border="0">
<input type="hidden" name="ud_contactid" value="<? echo $contactid; ?>">
<input type="hidden" name="ud_cid" value="<? echo $cid; ?>">
<tr><td>Company: </td><td><input type="text" name="ud_company" readonly="readonly" size="50" value="<? echo $company; ?>" /></td></tr>
<tr><td>Title: </td><td><input type="text" name="ud_title" size="50" value="<? echo $title; ?>" /></td></tr>
<tr><td>First Name: </td><td><input type="text" name="ud_cfirstname" size="50" value="<? echo $cfirstname; ?>" /></td></tr>
<tr><td>Surname: </td><td><input type="text" name="ud_csurname" size="50" value="<? echo $csurname; ?>" /></td></tr>
<tr><td>Position: </td><td><input type="text" name="ud_pos" size="50" value="<? echo $pos; ?>" /></td></tr>
<tr><td>Telephone: </td><td><input type="text" name="ud_telephone" size="50" value="<? echo $tel; ?>" /></td></tr>
<tr><td>Mobile: </td><td><input type="text" name="ud_mobile" size="50" value="<? echo $mob; ?>" /></td></tr>
<tr><td>Facsimile: </td><td><input type="text" name="ud_fax" size="50" value="<? echo $fax; ?>" /></td></tr>
<tr><td>Email: </td><td><input type="text" name="ud_email" size="50" value="<? echo $email; ?>" /></td></tr>
<!--<tr><td></td><td><input type="text" name="ud_uid" size="50" value="<? echo $uid; ?>" /></td></tr>-->
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>



<?php
++$j;
}

?>


<!--
<form action="update-db.php" method="post">
<table border="0">
<tr><td>First Name: </td><td><input type="text" value="<? echo $first; ?>" name="first" /></td></tr>
<tr><td>Last Name: </td><td><input type="text" value="<? echo $last; ?>" name="last"></td></tr>
<tr><td>Phone: </td><td><input type="text" value="<? echo $phone; ?>" name="phone"></td></tr>
<tr><td>Mobile: </td><td><input type="text" value="<? echo $mobile; ?>" name="mobile"></td></tr>
<tr><td>Fax: </td><td><input type="text" value="<? echo $fax; ?>" name="fax"></td></tr>
<tr><td>E-mail: </td><td><input type="text" value="<? echo $email; ?>" name="email"></td></tr>
<tr><td>Web: </td><td><input type="text" value="<? echo $web; ?>" name="web"></td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>
-->

</center>
</body>
</html>
