<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
if(!session_is_registered(myusername)){
header("location:../index.php");
}
include("../include/dbinfo.inc.php");
// $user = session_is_registered(myusername);
$contactid=$_GET['contactid'];
$companyid=$_GET['companyid'];
$uid = $_GET['uid'];

mysql_connect($server,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query1 = "SELECT * FROM contact_orders WHERE contactid='$contactid' ORDER BY date DESC";
$result1 = mysql_query($query1);
$num1 = mysql_numrows($result1);

mysql_close();


?>
<html>
<head><title>Footfall CRM</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<script type='text/javascript' src='http://www.footfall.ie/plugins/ceebox/js/jquery.js'></script> 
	<script type='text/javascript' src='http://www.footfall.ie/plugins/ceebox/js/jquery-swfobject.js' ></script>
	<script type='text/javascript' src='http://www.footfall.ie/plugins/ceebox/js/jquery.metadata.js'></script>
	<script type='text/javascript' src='http://www.footfall.ie/plugins/ceebox/js/jquery.color.js'></script>
    <script type='text/javascript' src='http://www.footfall.ie/plugins/ceebox/js/jquery.ceebox.js'></script>
    
    <script type='text/javascript' >
    jQuery(document).ready(function(){
		debugging = true;

		$.fn.ceebox.videos.base.param.allowScriptAccess = "sameDomain" //added to kill the permissions problem
		$.extend($.fn.ceebox.videos,{
			uctv:{
				siteRgx: /uctv\.tv\/search\-details/i, 
				idRgx: /(?:showID=)([0-9]+)/i, 
				src: "http://www.uctv.tv/player/player_uctv_bug.swf",
				flashvars: {previewImage : "http://www.uctv.tv/images/programs/[id].jpg", movie : "rtmp://webcast.ucsd.edu/vod/mp4:[id]",videosize:0,buffer:1,volume:50,repeat:false,smoothing:true}
			}
		});
		//$().ceebox(); //used to test to make sure the init call works.
		//$(".ceebox").ceebox({boxColor:'#fff',borderColor:'#525252',textColor:'#333',videoJSON:"js/humor.json"});
		$(".ceebox").ceebox({titles:false, borderColor:'#dcdcdc',boxColor:"#fff"});
		//$("map").ceebox({fadeOut:"slow",fadeIn:"slow",onload:function(){$("#cee_box").animate({backgroundColor:"#F00"},function(){$(this).animate({backgroundColor:"#fff"})});}});		
//		$("map").ceebox();		
//		$(".ceebox2").ceebox({unload:function(){$("body").css({background:"#ddf"})}});
		//window.console.log($.fn.ceebox.videos.colbertFull)
		//$("body").ceebox(); //uncomment and every link on the page is in one gallery
//		var testhtml = "<a href='http://balsaman.org' title='Balsa Man'>Balsa Man</a>"
		var link1 = "<a href='../templates/quote.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>' title='Footfall 01 8035000 / 091 792500 - Footfall Quotation'>Footfall Quotation</a>"
		var testhtml2 = "<div style='padding:20px;text-align:center'><h2>Hi I am some content built as a javascript variable!</h2><p><a href='#' class='cee_close'>Close Me</a></p></div>"

		$("#quote").click(function(){
			$.fn.ceebox.overlay();
			$.fn.ceebox.popup(link1,{onload:true,htmlWidth:600,htmlHeight:850,textColor:'#919191',boxColor:'#1c1c1c'});
			return false;		  
		});


	});	
    </script>
<link rel="stylesheet" href="http://www.footfall.ie/plugins/ceebox/css/ceebox.css" type="text/css" media="screen" />
</head>
<body>
<center>
<!--<a href="../view/view_contacts.php?id=<?echo $contactid;?>">Back to contacts</a>-->
<b><center>View Orders</center></b><br><br>
<table border="1" cellpadding="0" cellspacing="0">
<tr>
<th><font face="Arial, Helvetica, sans-serif">Order Number</font></th>
<th><font face="Arial, Helvetica, sans-serif">Salesperson</font></th>
<th><font face="Arial, Helvetica, sans-serif">Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Project</font></th>
<th><font face="Arial, Helvetica, sans-serif">Order Placed By</font></th>
<th><font face="Arial, Helvetica, sans-serif">Site Contact</font></th>
<!--
<th><font face="Arial, Helvetica, sans-serif">Installation Date</font></th>
<th><font face="Arial, Helvetica, sans-serif">Installation Time</font></th>
-->
</tr>
<?php

$j=0;
while ($j < $num1) {
$orderid=mysql_result($result1,$j,"orderid");
$cid=mysql_result($result1,$j,"cid");
$contactid=mysql_result($result1,$j,"contactid");
$salesperson=mysql_result($result1,$j,"salesperson");
$date=mysql_result($result1,$j,"date");
$po=mysql_result($result1,$j,"po");
$project=mysql_result($result1,$j,"project");
$orderplacedby=mysql_result($result1,$j,"orderplacedby");
$orderdetail=mysql_result($result1,$j,"orderdetail");
$sitename=mysql_result($result1,$j,"sitename");
$sitephone=mysql_result($result1,$j,"sitephone");
$siteemail=mysql_result($result1,$j,"siteemail");
$installdate=mysql_result($result1,$j,"installdate");
$installtime=mysql_result($result1,$j,"installtime");
$installer=mysql_result($result1,$j,"installer");
$documents=mysql_result($result1,$j,"documents");
$jobdetail=mysql_result($result1,$j,"jobdetail");
$jobconf=mysql_result($result1,$j,"jobconf");

$datef = date("d/m/Y",strtotime($date));
// $callbdatef = date("d/m/Y",strtotime($callbackdate));
$forderno = 'FS'.date('y').$orderid;
?>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><?echo $forderno;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $salesperson;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $datef;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $project;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $orderplacedby;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $sitename;?></font></td>
<!--
<td><font face="Arial, Helvetica, sans-serif"><?echo $installdate;?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?echo $installtime;?></font></td>
-->
<td><font face="Arial, Helvetica, sans-serif"><a href="../edit/edit_order.php?orderid=<?echo $orderid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">Edit</a></font></td>
<!--<td><font face="Arial, Helvetica, sans-serif"><a href="../delete/remove_quote.php?quoteid=<?echo $quoteid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">Delete</a></font></td>-->
<!--<td><font face="Arial, Helvetica, sans-serif"><a href="../templates/order.php?orderid=<?echo $orderid;?>&amp;contactid=<?echo $contactid;?>&amp;companyid=<?echo $cid;?>&amp;uid=<?echo $uid;?>&amp;sp=<?echo $salesperson;?>">Display</a></font></td>-->
<!--<td><font face="Arial, Helvetica, sans-serif"><a href="#" id="quote">Display</a></font></td>-->
</tr>

<?php
$j++;
}
echo "</table>";
?>

</center>
</body>
</html>
