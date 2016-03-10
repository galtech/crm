<?
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
//if(!session_is_registered(myusername)){
if(!$_SESSION['myusername']){
header("location:index.php");
}

include("include/dbinfo.inc.php");
$uid = $_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "DELETE FROM onlineusers WHERE uid=$uid";
$result = mysql_query($query);

mysql_close();

session_destroy();
header("location:index.php");

?>
