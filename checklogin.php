<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
include("include/dbinfo.inc.php");

// check captcha code
if ($_REQUEST["tt_pass"]){
	if ($_REQUEST["tt_pass"] == $_SESSION["tt_pass"]){

$tbl_name="crmuser"; // Table name	
	
// Connect to server and select databse.
mysql_connect("$server", "$username", "$password")or die("cannot connect to database");
mysql_select_db("$database")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$md5password = md5($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$md5password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

		if($count==1){
		// Register $myusername, $mypassword and redirect
		$_SESSION['myusername'] = $myusername;
		$_SESSION['mypassword'] = $md5password;
		header("location:admin/register_online_sessions.php?username=$myusername");
		}else{
			header("location:error_pages/unrecogniseduser.php");
			}

//}

	}else{
		header("Location:error_pages/codeerror.php","false");	
		//$tt_pass = $_SESSION["tt_pass"];
		//echo $tt_pass;
	}
}else{
		header("Location:error_pages/codenotfound.php","false");	
}

?>
