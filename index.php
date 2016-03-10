<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
?>
<html>
<head><title>Footfall CRM</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript">
function activateField(){
var field = document.getElementById('myusername');
field.focus();
}
</script>
</head>
<body onload="activateField()">
<center>
<div id="wrapper">
<div id="header">
<div id="logo"><h1>footfall</h1></div>
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />
https://secure1.register365.com/~
-->
</div>
<div id="content">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>CRM Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td> </td>
<td> </td>
<td><img src="captcha_image.php" alt="Security Code" title="Security Code" width="150" height="45"/></td>
<td> </td>
<td> </td>
</tr>
<tr>
<td width="78">Security Code</td>
<td width="6">:</td>
<td width="294"><input type="text" name="tt_pass" id="tt_pass" size="4"/></td>
</tr>
<tr>
<td> </td>
<td> </td>
<td><input type="submit" name="Submit" value="Login"></td>
<td> </td>
<td> </td>
</tr>
<tr>
<td><a href="mailto:peter@peterheylin.com?subject=Forgot CRM Password">Forgot Password?</a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br />
</div>
<div id="footer">
<br />
Footfall CRM 2.2 developed by <a href="http://www.peterheylin.com" target="_blank">Peter Heylin</a> &copy; All Rights Reserved 2010-2012
</div>

</div>
</center>
</body>
</html>
