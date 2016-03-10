<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}

include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
// $storeuser = $_GET['username'];
$uid = $_GET['id'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

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
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/popup.js"></script>

<!--Start Form Validation-->
<script type="text/javascript">
function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("status", "company", "indsec", "address1", "address2", "county", "telephone", "email");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Status", "Company Name", "Industry Sector", "Address line 1" , "Address line 2", "County", "Telephone number", "Email address");
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


<b><center>Add Company</center></b><br><br>

<form action="insert_company.php" onsubmit="return formCheck(this);" method="post">
<table border="0">
<tr><td>Status: </td>
<td><select name="status"/>
<option value="" selected="selected"></option>
<option>Existing</option><option>Potential</option><option>Other</option>
</select></td></tr>
<tr><td>Company: </td><td><input type="text" name="company" size="50"/></td></tr>
<tr><td>Industry Sector: </td><td><select name="indsec">
<option value="" selected="selected"></option>
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
<!--
<a onmouseover="popup($('#hidden-table').html(), 400);" href="#">Key</a>
<div id="hidden-table" style="display:none;">
<table border="1" cellpadding="2" cellspacing="2">
<tr><td>ARCH </td><td> Architects</td></tr>
<tr><td>BANK </td><td> Banks</td></tr>
<tr><td>CAR </td><td> Car dealers / showrooms</td></tr>
<tr><td>DAIRY </td><td> Dairy producers</td></tr>
<tr><td>DOM </td><td> Domestic</td></tr>
<tr><td>EDUC </td><td> Education</td></tr>
<tr><td>FLOOR </td><td> Flooring contractor</td></tr>
<tr><td>GOV </td><td> Government</td></tr>
<tr><td>HCARE </td><td> Healthcare</td></tr>
<tr><td>HIGH </td><td> High street retail</td></tr>
<tr><td>HO/LE </td><td> Hospitality / Leisure</td></tr>
<tr><td>INTE </td><td> Interior design</td></tr>
<tr><td>MEDD </td><td> Medical device manufacturers</td></tr>
<tr><td>PHAR </td><td> Pharmaceuticals</td></tr>
<tr><td>PROP </td><td> Property managment / auctioneers</td></tr>
<tr><td>SC </td><td> Shopping centres</td></tr>
<tr><td>SHOP </td><td> Shop fitter</td></tr>
<tr><td>SUPER </td><td> Supermarkets</td></tr>
<tr><td>TRAN </td><td> Transport</td></tr>
<tr><td>N/A </td><td> Other </td></tr>
</table>
</div>
-->
</td> </tr>
<tr><td>Address1: </td><td><input type="text" name="address1" size="50"/></td></tr>
<tr><td>Address2: </td><td><input type="text" name="address2" size="50"/></td></tr>
<tr><td>Address3: </td><td><input type="text" name="address3" size="50"/></td></tr>
<tr><td>County: </td><td><!--<input type="text" name="county" size="50"/>-->
<select name="county">
<option value="" selected="selected"></option>
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
<tr><td>Telephone: </td><td><input type="text" name="telephone" size="50"/></td></tr>
<tr><td>Fax: </td><td><input type="text" name="fax" size="50"/></td></tr>
<tr><td>E-mail: </td><td><input type="text" name="email" size="50"/></td></tr>
<tr><td>Website: </td><td><input type="text" name="web" size="50"/></td></tr>
<tr><td>How they heard about us?: </td><td><select name="source" >
<option value=""></option>
<option value="Website">Website</option><option value="Search Engine">Search Engine</option>
<option value="Social Media">Social Media</option><option value="Show/Conference">Show/Conference</option>
<option value="Newspaper/Billboard">Newspaper/Billboard</option><option value="TV/Radio">TV/Radio</option>
<option value="Vehicles">Vehicles</option><option value="Word of Mouth">Word of Mouth</option>
<option value="Other">Other</option>
</select>
</td></tr>
<tr><td></td><td><input type="hidden" name="uid" value="<?echo $uid;?>" size="50"/></td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>




<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
