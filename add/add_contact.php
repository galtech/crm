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

<!--Start Form Validation-->
<script type="text/javascript">
function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("title", "cfirstname", "csurname", "telephone", "email");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Title", "First Name", "Surname", "Telephone number" , "Email address");
	// dialog message
	var alertMsg = "Please complete the following fields:\n";

	var l_Msg = alertMsg.length;

	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){ 					if (obj[j].checked){ 						blnchecked = true; 					} 				} 				if (!blnchecked){ 					alertMsg += " - " + fieldDescription[i] + "\n"; 				} 			} 		} 	} 	if (alertMsg.length == l_Msg){ 		return true; 	}else{ 		alert(alertMsg); 		return false; 	} }
</script>
<!--End Form Validation-->

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


<b><center>Add Contact</center></b><br><br>

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


?>


<form action="insert_contact.php" onsubmit="return formCheck(this);" method="post">
<table border="0">
<tr><td></td><td><input type="hidden" name="cid" value="<? echo $id; ?>" /></td></tr>
<tr><td></td><td><input type="text" readonly name="company" size="50" value="<? echo $company; ?>"/></td></tr>
<tr><td>Title: </td><td><input type="text" name="title" size="50"/></td></tr>
<tr><td>Contact Firstname: </td><td><input type="text" name="cfirstname" size="50"/></td></tr>
<tr><td>Contact Surname: </td><td><input type="text" name="csurname" size="50"/></td></tr>
<tr><td>Position: </td><td><input type="text" name="position" size="50"/></td></tr>
<tr><td>Telephone: </td><td><input type="text" name="telephone" size="50"/></td></tr>
<tr><td>Mobile: </td><td><input type="text" name="mobile" size="50"/></td></tr>
<tr><td>Fax: </td><td><input type="text" name="fax" size="50"/></td></tr>
<tr><td>E-mail: </td><td><input type="text" name="email" size="50"/></td></tr>
<tr><td></td><td><input type="hidden" name="uid" value="<?echo $uid;?>" size="50"/></td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>

<?php
++$j;
}

?>


<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
