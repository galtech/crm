<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}

include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
// $storeuser = $_GET['username'];
$contactid = $_GET['contactid'];
$companyid = $_GET['companyid'];
$uid = $_GET['uid'];
$curdate = date("d-m-Y");

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
<link href="../css/datePicker.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="../js/datePicker.js"></script>

<!--Start Form Validation-->
<script type="text/javascript">
function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("action", "callbackdate", "rank", "value");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Action", "Call Back Date", "Rank", "Value");
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
<center>
<b><center>Add Call</center></b><br><br>

<form action="insert_call.php" onsubmit="return formCheck(this);" method="post">
<table border="0">
<tr><td><input type="hidden" name="companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" value="<?echo $initials;?>" name="salesperson"/></td></tr>
<tr><td>Date: </td><td><input type="text" value="<?echo $curdate;?>" name="date" size="50"/></td></tr>
<tr><td>Action Taken: </td><td><textarea name="action" rows="6" cols="50"></textarea></td></tr>
<tr><td>Call Back Date: </td><td><input type="text" name="callbackdate" size="50"/>
<input type="button" value="select" onclick="displayDatePicker('callbackdate', this);"/></td>
</tr>
<tr><td>Rank 1-8: </td><td>
<select name="rank">
<option value="" selected="selected"></option>
<option value="1">1 Call 6 months</option>
<option value="2">2 Call 1 month</option>
<option value="3">3 Call 2 weeks</option>
<option value="4">4 Call 1 week</option>
<option value="5">5 Call 3 days</option>
<option value="6">6 Call 1 day</option>
<option value="7">7 Quote issued</option>
<option value="8">8 PO received</option>
</select>
</td></tr>
<!--
<tr rowspan="2"><td>Rank 1-8: </td></tr>
<tr><td style="font-size:10pt;">1 Call 6 months</td><td><input type="radio" name="rank" value="1" size="50"/></td></tr>
<tr><td style="font-size:10pt;">2 Call 1 month</td><td><input type="radio" name="rank" value="2" size="50"/></td></tr>
<tr><td style="font-size:10pt;">3 Call 2 weeks</td><td><input type="radio" name="rank" value="3" size="50"/></td></tr>
<tr><td style="font-size:10pt;">4 Call 1 week</td><td><input type="radio" name="rank" value="4" size="50"/></td></tr>
<tr><td style="font-size:10pt;">5 Call 3 days</td><td><input type="radio" name="rank" value="5" size="50"/></td></tr>
<tr><td style="font-size:10pt;">6 Call 1 day</td><td><input type="radio" name="rank" value="6" size="50"/></td></tr>
<tr><td style="font-size:10pt;">7 Quote issued</td><td><input type="radio" name="rank" value="7" size="50"/></td></tr>
<tr><td style="font-size:10pt;">8 PO received</td><td><input type="radio" name="rank" value="8" size="50"/></td></tr>
-->
<tr><td>Value: </td><td><input type="text" name="value" size="50"/></td></tr>
<tr><td>Appointment secured: </td><td><input type="checkbox" name="appointmentcheck" value="Yes" size="50"/></td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>
<!--
<form action="insert_call.php" method="post">
<table border="0">
<tr><td><input type="hidden" name="companyid" value="<?echo $companyid;?>" size="50"/></td></tr>
<tr><td><input type="hidden" name="contactid" value="<?echo $contactid;?>" size="50"/></td></tr>
<tr><td>Salesperson: </td><td><input type="text" readonly="readonly" value="<?echo $initials;?>" name="salesperson"/></td></tr>
<tr><td>Date (MM/DD/YYYY): </td><td><input type="text" value="<?echo $curdate;?>" name="date" size="50"/></td></tr>
<tr><td>Action Taken: </td><td><textarea name="action" rows="6" cols="50"></textarea></td></tr>
<tr><td>Call Back Date (MM/DD/YYYY): </td><td><input type="text" name="callbackdate" size="50"/></td></tr>
<tr rowspan="2"><td>Rank 1-5: </td><td><input type="text" name="rank" size="50"/></td></tr> 
<tr><td><font size="2"><i>1 Call 6 months <br /> 2 Call 1 month <br /> 3 Call 2 weeks 
<br /> 4 Quote issued <br /> 5 PO Received</font></i></td></tr> 
<tr><td>Value: </td><td><input type="text" name="value" size="50"/></td></tr>
<tr><td><input type="Submit" value="Save" /></td></tr>
</table>
</form>
-->

</center>
</body>
</html>

