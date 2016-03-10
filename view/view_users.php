<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
$uid = $_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM crmuser ORDER BY username ASC";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);

$query3 = "SELECT * FROM onlineusers WHERE uid='$uid'";
$result3 = mysql_query($query3);
$num3 = mysql_numrows($result3);
//$username = mysql_db_name($result1,$row['username']);

$i=0;
while ($i < $num3) {
$uid=mysql_result($result3,$i,"uid");
$initials=mysql_result($result3,$i,"initials");
$firstname=mysql_result($result3,$i,"firstname");
$lastname=mysql_result($result3,$i,"lastname");
$username=mysql_result($result3,$i,"username");
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
<td><form method="post" action="../adminmenu.php?id=<?echo $uid;?>"><input type="submit" value="Home" /></form></td>
</tr>
</table>


<b><center>Manage Users</center></b><br><br>

<table border="1" cellpadding="2" cellspacing="2">
<tr>
<th></th>
<th></th>
<th></th>
<th>Initials</th>
<th>First Name</th>
<th>Last Name</th>
<th>Username</th>
<!--<th>Password</th>-->
<th>Telephone</th>
<th>Email</th>
<th>Role</th>
</tr>

<?php

$j=0;
while ($j < $num1) {
$userid=mysql_result($result1,$j,"uid");
$initials=mysql_result($result1,$j,"initials");
$firstname=mysql_result($result1,$j,"firstname");
$lastname=mysql_result($result1,$j,"lastname");
$usernames=mysql_result($result1,$j,"username");
$passwords=mysql_result($result1,$j,"password");
$tel=mysql_result($result1,$j,"telephone");
$email=mysql_result($result1,$j,"email");
$role=mysql_result($result1,$j,"role");


?>

<tr>
<td><a href="../admin/logout_oneuser.php?userid=<?php echo $userid;?>&amp;id=<?php echo $uid;?>">Log Out</a></td>
<td><a href="../edit/edit_user.php?userid=<?php echo $userid;?>&amp;uid=<?php echo $uid;?>">Edit</a></td>
<td><a href="../delete/remove_user.php?userid=<?php echo $userid;?>&amp;uid=<?php echo $uid;?>">Delete</a></td>
<td><?php echo $initials;?></td>
<td><?php echo $firstname;?></td>
<td><?php echo $lastname;?></td>
<td><?php echo $usernames;?></td>
<td><?php echo $tel;?></td>
<td><?php echo $email;?></td>
<td><?php echo $role;?></td>
</tr>

<?php
$j++;
}

?>
</table>


</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>
</div>
</center>
</body>
</html>
