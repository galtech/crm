<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!$_SESSION['myusername']){
header("location:index.php");
}

include("../include/dbinfo.inc.php");
$uid = $_GET['id'];

$backupfile = "/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/web/footfall/footfallcrm/1.6/backups/crmbackup".date("d-m-Y_G:i").".sql";
system("mysqldump --opt -h{$server} -u{$username} -p{$password} {$database} > ".$backupfile);

/*
mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


$backupfile = "/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/web/footfall/footfallcrm/1.6/backups/crmbackup ".date ("d-m-Y G:i").".sql";

$query = "SELECT * FROM company,company_contact,contact_calls,contact_files,contact_quotes,crmuser INTO OUTFILE ".$backupfile;
$result = mysql_query($query);

mysql_close();
*/

?>
<html>
<head>
<!--<meta http-equiv='refresh' content='5;url=santabook-index.php'> -->
</head>
<body>
<center>
<h2>Backup of CRM successful</h2>
<?php
// $backup_file = "http://www.santascastle.ie/admin/backups/customer".date(" d-m-y G:i").".csv";
// $file_download = chmod($backup_file, 0755);
?>

<!--<a href="<?php echo $file_download; ?>">Save a copy of the backup</a>-->
<a href="../adminmenu.php?id=<?echo $uid;?>">Back to admin menu</a>

</center>
</body>
</html>

