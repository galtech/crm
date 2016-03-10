<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
//$continue="http://footfall.peterheylin.ie";
$companyid=$_GET['id'];
$uid = $_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


$query3 = "SELECT * FROM company_fclients WHERE companyid='$companyid'";
$result3 = mysql_query($query3);
$num3 = mysql_numrows($result3);

while ($row = mysql_fetch_array($result3)){

 $printsalesrep = $row['salesperson']; 
 $fclientid = $row['clientid'];
 }

$query2 = "SELECT * FROM company WHERE cid='$companyid'";
$result2 = mysql_query($query2);
$num2 = mysql_numrows($result2);

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


<b><center>Edit Company</center></b><br><br>

<?php

$j=0;
while ($j < $num2) {
$id=mysql_result($result2,$j,"cid");
$company=mysql_result($result2,$j,"company");
$add1=mysql_result($result2,$j,"address1");
$add2=mysql_result($result2,$j,"address2");
$add3=mysql_result($result2,$j,"address3");
$county=mysql_result($result2,$j,"county");
$tel=mysql_result($result2,$j,"telephone");
$fax=mysql_result($result2,$j,"fax");
$email=mysql_result($result2,$j,"email");
$web=mysql_result($result2,$j,"web");
$indsec=mysql_result($result2,$j,"indsec");
$status=mysql_result($result2,$j,"status");
$source=mysql_result($result2,$j,"source");

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

<form action="update_company.php" method="post">
<table border="0">
<input type="hidden" name="ud_companyid" value="<? echo $companyid; ?>">
<tr><td>Status: </td>
<td><select name="ud_status"/>
<option value="<? echo $status; ?>" selected="selected"><? echo $status; ?></option>
<option value="Existing">Existing</option><option value="Potential">Potential</option><option value="Other">Other</option>
</select></td></tr>

<!--
<tr><td>Sales Rep:</td><td>
<select name="ud_salesrep"/>
<option value="<? echo $printsalesrep; ?>" selected="selected"><? echo $printsalesrep; ?></option>
<option value="DE">Dawn Eccles</option><option value="GH">Ger Halloran</option><option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option><option value="PH">Peter Heylin</option><option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option><option value="SK">Sinead Kelly</option>
</select>
</td></tr>
-->
<tr><td>Sales Rep: </td><td><input type="text" name="ud_salesrep" size="50" value="<? echo $printsalesrep; ?>" readonly="readonly" style="background:#eee;" /></td></tr>
<tr><td>Company: </td><td><input type="text" name="ud_company" size="50" value="<? echo $company; ?>" /></td></tr>
<tr><td>Address1: </td><td><input type="text" name="ud_address1" size="50" value="<? echo $add1; ?>" /></td></tr>
<tr><td>Address2: </td><td><input type="text" name="ud_address2" size="50" value="<? echo $add2; ?>" /></td></tr>
<tr><td>Address3: </td><td><input type="text" name="ud_address3" size="50" value="<? echo $add3; ?>" /></td></tr>
<tr><td>County: </td><td><!--<input type="text" name="ud_county" size="50" value="<? echo $county; ?>" />-->
<select name="ud_county">
<option value="<? echo $county; ?>" selected="selected"><? echo $county; ?></option>
<option value="Antrim">Antrim</option>
<option value="Armagh">Armagh</option>
<option value="Carlow">Carlow</option>
<option value="Cavan">Cavan</option>
<option value="Clare">Clare</option>
<option value="Cork">Cork</option>
<option value="Derry">Derry</option>
<option value="Donegal">Donegal</option>
<option value="Down">Down</option>
<option value="Dublin">Dublin</option>
<option value="Fermanagh">Fermanagh</option>
<option value="Galway">Galway</option>
<option value="Kerry">Kerry</option>
<option value="Kildare">Kildare</option>
<option value="Kilkenny">Kilkenny</option>
<option value="Laois">Laois</option>
<option value="Leitrim">Leitrim</option>
<option value="Limerick">Limerick</option>
<option value="Longford">Longford</option>
<option value="Louth">Louth</option>
<option value="Mayo">Mayo</option>
<option value="Meath">Meath</option>
<option value="Monaghan">Monaghan</option>
<option value="Offaly">Offaly</option>
<option value="Roscommon">Roscommon</option>
<option value="Sligo">Sligo</option>
<option value="Tipperary">Tipperary</option>
<option value="Tyrone">Tyrone</option>
<option value="Waterford">Waterford</option>
<option value="Westmeath">Westmeath</option>
<option value="Wexford">Wexford</option>
<option value="Wicklow">Wicklow</option>
</select>
</td></tr>
<tr><td>Telephone: </td><td><input type="text" name="ud_telephone" size="50" value="<? echo $tel; ?>" /></td></tr>
<tr><td>Fax: </td><td><input type="text" name="ud_fax" size="50" value="<? echo $fax; ?>" /></td></tr>
<tr><td>E-mail: </td><td><input type="text" name="ud_email" size="50" value="<? echo $email; ?>" /></td></tr>
<tr><td>Website: </td><td><input type="text" name="ud_web" size="50" value="<? echo $web; ?>" /></td></tr>
<tr><td>Industry Sector: </td><td><!--<input type="text" name="ud_indsec" size="50" value="<? echo $indsec; ?>" />-->
<select name="ud_indsec">
<option value="<? echo $indsec; ?>" selected="selected"><? echo $indsec; ?></option>
<option value="ARCH">Architects</option>
<option value="BANK">Banks</option>
<option value="CAR">Car dealers / showrooms</option>
<option value="CON">Construction</option>
<option value="DAIRY">Dairy producers</option>
<option value="DOM">Domestic</option>
<option value="EDUC">Education</option>
<option value="ELEC">Electronic</option>
<option value="FLOOR">Flooring contractor</option>
<option value="GOV">Government</option>
<option value="HCARE">Healthcare</option>
<option value="HIGH">High street retail</option>
<option value="HO/LE">Hospitality / Leisure</option>
<option value="INTE">Interior design</option>
<option value="MANU">Manufacturing</option>
<option value="MEDD">Medical device manufacturers</option>
<option value="PHAR">Pharmaceuticals</option>
<option value="PROP">Property managment / auctioneers</option>
<option value="SC">Shopping centres</option>
<option value="SHOP">Shop fitter</option>
<option value="SERV">Services</option>
<option value="SUPER">Supermarkets</option>
<option value="TRAN">Transport</option>
<option value="N/A">Other</option>
</select>
</td></tr>
<tr><td>How they heard about us?: </td><td>
<select name="ud_source">
<option value="<? echo $source; ?>" selected="selected"><? echo $source; ?></option>
<option value="Website">Website</option><option value="Search Engine">Search Engine</option>
<option value="Social Media">Social Media</option><option value="Show/Conference">Show/Conference</option>
<option value="Newspaper/Billboard">Newspaper/Billboard</option><option value="TV/Radio">TV/Radio</option>
<option value="Vehicles">Vehicles</option><option value="Word of Mouth">Word of Mouth</option>
<option value="Other">Other</option>
</select>
</td></tr>
<tr><td> </td><td><input type="hidden" name="ud_uid" size="50" value="<? echo $uid; ?>" /></td></tr>
<tr><td> </td><td><input type="hidden" name="ud_fclientid" size="50" value="<? echo $fclientid; ?>" /></td></tr>
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

<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
