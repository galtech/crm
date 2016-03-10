<?
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:index.php");
}

include("include/dbinfo.inc.php");
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
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
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

<!--
<form method="get" action="call-rates.php">
<input type="text" name="companysearch" />
<input type="submit" value="Company Search" />
</form>
-->
<b><center>Search CRM</center></b><br><br>
<table border="0" cellpadding="2" cellspacing="2">
<tr>

<td align="center">
<form method="get" action="search/search_company.php" ><input type="text" name="companysearch"/><input type="hidden" name="uid" value="<?echo $uid;?>"/> <input type="submit" value="Search By Company Name" /></form>
</td>

<td align="center">
<form method="get" action="search/search_status.php" >
<!--<input type="text" name="companystatus"/>-->
<select name="companystatus">
<option value=""></option>
<option value="Existing">Existing</option>
<option value="Potential">Potential</option>
<option value="Other">Other</option>
</select>
<input type="hidden" name="uid" value="<?echo $uid;?>"/><input type="submit" value="Search By Company Status" /></form>
</td>

<tr>
<td align="center">
<form method="get" action="search/search_contact.php" ><input type="text" name="contactsearch"/><input type="hidden" name="uid" value="<?echo $uid;?>"/><input type="submit" value="Search By Contact Name" /></form>
</td>

<td align="center">
<form method="get" action="search/search_location.php" >
<!--<input type="text" name="companylocation"/>-->
<select name="companylocation">
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
<input type="hidden" name="uid" value="<?echo $uid;?>"/><input type="submit" value="Search By Location" /></form>

</td>
</tr>
</table>

<table border="0" align="center">

<tr>
<td>
<b><center>Search by Source</center></b><br><br>

<form method="get" action="search/search_by_source.php">
<label>Please select source:</label>
<select name="source" >
<!--<option value=""></option>-->
<option value="Website">Website</option><option value="Search Engine">Search Engine</option>
<option value="Social Media">Social Media</option><option value="Show/Conference">Show/Conference</option>
<option value="Newspaper/Billboard">Newspaper/Billboard</option><option value="TV/Radio">TV/Radio</option>
<option value="Vehicles">Vehicles</option><option value="Word of Mouth">Word of Mouth</option>
<option value="Other">Other</option>
</select>
<input type="hidden" name="id" value="<?echo $uid;?>"/>
<input type="submit" name="submit" value="Go"/>
</form>
</td>
</tr>

<tr>
<td>
<b><center>Search Clients by Sales Rep</center></b><br><br>

<form method="get" action="search/search_by_sales_rep.php">
<label>Please select salesperson:</label>
<select name="salesperson">
<!--<option value="" selected="selected"></option>-->
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

<label>County:</label>
<select name="selectedcounty">
<!--<option value="" selected="selected"></option>-->
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

<input type="submit" name="submit" value="Go"/>
</form>
</td>
</tr>
</table>
<!--
<form method="get" action="search/view-db.php"><input type="submit" value="View All Contacts" /></form>
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
