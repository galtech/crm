<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!$_SESSION['myusername']){
header("location:index.php");
}

include("../include/dbinfo.inc.php");
$uid = $_GET['id'];

$filename = "/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/web/footfall/footfallcrm/1.6/backups/quotes_table_".date ("d-m-Y G:i").".csv";

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$fp = fopen($filename, "w");

$query="SELECT * FROM contact_quotes";
$result=mysql_query($query);

// fetch a row and write the column names out to the file
$row = mysql_fetch_assoc($result);
$line = "";
$comma = "";
foreach($row as $name => $value) {
    $line .= $comma . '"' . str_replace('"', '""', $name) . '"';
    $comma = ",";
}
$line .= "\n";
fputs($fp, $line);

// remove the result pointer back to the start
mysql_data_seek($result, 0);

// and loop through the actual data
while($row = mysql_fetch_assoc($result)) {
   
    $line = "";
    $comma = "";
    foreach($row as $value) {
        $line .= $comma . '"' . str_replace('"', '""', $value) . '"';
        $comma = ",";
    }
    $line .= "\n";
    fputs($fp, $line);
   
}

fclose($fp);

mysql_close();
?>
<html>
<head>
<!--<meta http-equiv='refresh' content='5;url=santabook-index.php'> -->
</head>
<body>
<center>
<h2>Backup of quotes table successful</h2>
<?php
// $backup_file = "http://www.santascastle.ie/admin/backups/customer".date(" d-m-y G:i").".csv";
// $file_download = chmod($backup_file, 0755);
?>

<!--<a href="<?php echo $file_download; ?>">Save a copy of the backup</a>-->
<a href="csvbackups.php?id=<?echo $uid;?>">Back to backup menu</a>

</center>
</body>
</html>

