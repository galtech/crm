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
<td><form method="post" action="../adminmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
</tr>
</table>


<b><center>Add User</center></b><br><br>

<form action="insert_user.php" method="post">
<table border="0">
<tr><td>Initials: </td><td><input type="text" name="initials" size="50"/></td></tr>
<tr><td>First Name: </td><td><input type="text" name="firstname" size="50"/></td></tr>
<tr><td>Last Name: </td><td><input type="text" name="lastname" size="50"/></td></tr>
<tr><td>Username: </td><td><input type="text" name="username" size="50"/></td></tr>
<tr><td>Password: </td><td><input type="text" name="password" size="50"/></td></tr>
<tr><td>Telephone: </td><td><input type="text" name="telephone" size="50"/></td></tr>
<tr><td>E-mail: </td><td><input type="text" name="email" size="50"/></td></tr>
<tr><td>Role: </td><td>
<select name="role">
<option value=" "></option>
<option value="Administrator">Administrator</option>
<option value="User">User</option>
<option value="NA">NA</option>
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
