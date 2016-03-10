<?
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:index.php");
}
include("include/dbinfo.inc.php");

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
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/datePicker.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="js/datePicker.js"></script>

</head>
<body>
<p>You are logged in as <b><?echo $firstname." ".$lastname." ";?></b><a href="logout.php?uid=<?echo $uid;?>">Logout</a></p>

<center>
<div id="wrapper">

<div id="header">
<div id="logo"><h1>footfall</h1></div>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
</div>
<div id="content">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td><form method="post" action="mainmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
<td><form method="post" action="search.php?id=<?echo $uid;?>"><input type="submit" value="Search" /></form></td>
<td><form method="post" action="salesmenu.php?id=<?echo $uid;?>"><input type="submit" value="Sales" /></form></td>
</tr>
</table>

<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>

<b><center>Sales Activity</center></b><br><br>

<form action="sales/search_salesperson_activity.php" method="post">
<label>Please select salesperson:</label>
<select name="salesperson">
<option value="" selected="selected"></option>
<option value="DE">Dawn Eccles</option>
<option value="GH">Ger Halloran</option>
<option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option>
<option value="MOC">Mary O Connor</option>
<option value="PH">Peter Heylin</option>
<option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option>
<option value="SK">Sinead Kelly</option>
</select>
<br />
<label>Date from:</label>
<input type="text" name="activitydatefrom"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatefrom', this);"/>
<br />
<label>Date to:</label>
<input type="text" name="activitydateto"/>
<input type="button" value="select" onclick="displayDatePicker('activitydateto', this);"/>
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<br />
<input type="submit" name="submit" value="Go"/>
</form>
</td>

<td>
<b><center>Upcoming Sales Calls</center></b><br><br>
<form action="sales/search_upcomingcalls.php" method="post">
<label>Please select salesperson:</label>
<select name="salesperson">
<option value="" selected="selected"></option>
<option value="DE">Dawn Eccles</option>
<option value="GH">Ger Halloran</option>
<option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option>
<option value="MOC">Mary O Connor</option>
<option value="PH">Peter Heylin</option>
<option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option>
<option value="SK">Sinead Kelly</option>
</select>
<br />
<label>Date from:</label>
<input type="text" name="upcomingdatefrom"/>
<input type="button" value="select" onclick="displayDatePicker('upcomingdatefrom', this);"/>
<br />
<label>Date to:</label>
<input type="text" name="upcomingdateto"/>
<input type="button" value="select" onclick="displayDatePicker('upcomingdateto', this);"/>
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<br />
<input type="submit" name="submit" value="Go"/>
</form>
</td>

<td>
<b><center>Sales Appointments</center></b><br><br>
<form action="sales/search_salesperson_appointments.php" method="post">
<label>Please select salesperson:</label>
<select name="salesperson">
<option value="" selected="selected"></option>
<option value="DE">Dawn Eccles</option>
<option value="GH">Ger Halloran</option>
<option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option>
<option value="MOC">Mary O Connor</option>
<option value="PH">Peter Heylin</option>
<option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option>
<option value="SK">Sinead Kelly</option>
</select>
<br />
<label>Date from:</label>
<input type="text" name="appsearchfrom"/>
<input type="button" value="select" onclick="displayDatePicker('appsearchfrom', this);"/>
<br />
<label>Date to:</label>
<input type="text" name="appsearchto"/>
<input type="button" value="select" onclick="displayDatePicker('appsearchto', this);"/>
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<br />
<input type="submit" name="submit" value="Go"/>
</form>


</td>
</tr>
<tr>

<td>
<b><center>Sales Activity by rank</center></b><br><br>

<form action="sales/search_salesperson_activity_by_rank.php" method="post">
<label>Please select salesperson:</label>
<select name="salesperson">
<option value="" selected="selected"></option>
<option value="DE">Dawn Eccles</option>
<option value="GH">Ger Halloran</option>
<option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option>
<option value="MOC">Mary O Connor</option>
<option value="PH">Peter Heylin</option>
<option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option>
<option value="SK">Sinead Kelly</option>
</select>
<br />
<label>Date from:</label>
<input type="text" name="activitydatefrombyrank"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatefrombyrank', this);"/>
<br />
<label>Date to:</label>
<input type="text" name="activitydatetobyrank"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatetobyrank', this);"/>
<br />
<label>Rank:</label>
<select name="selectedrank">
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
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<br />
<input type="submit" name="submit" value="Go"/>
</form>
</td>

<td>
<b><center>Sales Activity by location</center></b><br><br>

<form action="sales/search_salesperson_activity_by_location.php" method="post">
<label>Please select salesperson:</label>
<select name="salesperson">
<option value="" selected="selected"></option>
<option value="DE">Dawn Eccles</option>
<option value="GH">Ger Halloran</option>
<option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option>
<option value="MOC">Mary O Connor</option>
<option value="PH">Peter Heylin</option>
<option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option>
<option value="SK">Sinead Kelly</option>
</select>
<br />
<label>Date from:</label>
<input type="text" name="activitydatefrombylocation"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatefrombylocation', this);"/>
<br />
<label>Date to:</label>
<input type="text" name="activitydatetobylocation"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatetobylocation', this);"/>
<br />
<label>County:</label>
<select name="selectedlocation">
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
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<br />
<input type="submit" name="submit" value="Go"/>
</form>
</td>

<td>
<b><center>Sales Activity by industry</center></b><br><br>

<form action="sales/search_salesperson_activity_by_industry.php" method="post">
<label>Please select salesperson:</label>
<select name="salesperson">
<option value="" selected="selected"></option>
<option value="DE">Dawn Eccles</option>
<option value="GH">Ger Halloran</option>
<option value="LD">Lauren Dolan</option>
<option value="MG">Malcolm Goodbody</option>
<option value="MOC">Mary O Connor</option>
<option value="PH">Peter Heylin</option>
<option value="RM">Richard Mayne</option>
<option value="SM">Sharon Mullins</option>
<option value="SK">Sinead Kelly</option>
</select>
<br />
<label>Date from:</label>
<input type="text" name="activitydatefrombyindustry"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatefrombyindustry', this);"/>
<br />
<label>Date to:</label>
<input type="text" name="activitydatetobyindustry"/>
<input type="button" value="select" onclick="displayDatePicker('activitydatetobyindustry', this);"/>
<br />
<label>Industry Sector:</label>
<select name="selectedindustry">
<option value="" selected="selected"></option>
<option value="ARCH">ARCH</option><option value="BANK">BANK</option><option value="CAR">CAR</option><option value="CON">CON</option>
<option value="DAIRY">DAIRY</option><option value="ED/HE">ED/HE</option><option value="GOV">GOV</option><option value="HIGH">HIGH</option>
<option value="HO/LE">HO/LE</option><option value="INTE">INTE</option><option value="MEDD">MEDD</option><option value="PHAR">PHAR</option>
<option value="PROP">PROP</option><option value="SC">SC</option><option value="SUPER">SUPER</option><option value="TRAN">TRAN</option><option value="N/A">N/A</option>
</select>
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<br />
<input type="submit" name="submit" value="Go"/>
</form>
</td>

</tr>
</table>




<!--
Please select salesperson:
<form action="sales/search_callback.php" method="get">
<select onchange="this.form.submit()" name="salesperson">
<option value="" selected="selected"></option>
<option value="GH">Ger Halloran</option>
<option value="MG">Malcolm Goodbody</option>
<option value="RM">Richard Mayne</option>
</select>
<input type="hidden" name="id" value="<?echo $uid;?>"/>
</form>
-->

</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
