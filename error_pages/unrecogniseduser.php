<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
?>
<html>
<head><title>Footfall CRM</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
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
<!--<img src="images/logo.png" alt="Footfall Logo" title="Footfall Logo" width="80%" />-->
</div>
<div id="content">

<p>
An error occurred processing your login - your username or password was not found. For more information about this error, please contact the IT department on ext 273 or 087 9486872 (out of hours).
</p>
<p>
Please <a href="../index.php">click here</a> to return to the login screen.
</p>
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
