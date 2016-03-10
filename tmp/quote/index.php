<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();
//$_SESSION['user'] = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Entrance Mats Ireland - Entrance Matting Ireland - Flooring Systems Ireland - Carpet tiles Ireland - Footfall - Logo Mats</title>
<!-- <link rel="shortcut icon" href="images/iconcopy.ico" /> --> 
<meta name="title" content="Footfall Product Specifications" />
<meta name="keywords" content="entrance mats matting carbon neutral negative carpet tiles interior barrier matting forma atrium plus wom millitron millitex milliken obex exterior barrier matting prior pvc matting modular matting logo message mats bounce dm playground matting dycem clean room matting washable tac mats matting anti fatigue anti microbial mats matting coir aluminium profile wet area matting lift flooring matwells frames certified installation after sales service" />
<meta name="description" content="Footfall are a service oriented provider of high quality Milliken Carpet Tiles, Milliken Obex Entrance Matting Systems, and other flooring systems" /> 
<script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery/jquery.slidertron-0.1.js"></script>
<script type="text/javascript" src="http://www.footfall.ie/js/menu.js"></script>

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
		var link1 = "<a href='http://www.footfall.ie/privacy.html' title='Footfall 01 2194604 / 091 867651 - Privacy Policy'>Privacy Policy</a>"
		var link2 = "<a href='http://www.footfall.ie/quote/product_key.html' title='Footfall 01 2194604 / 091 867651 - Product Key'>Product Key</a>"
		var testhtml2 = "<div style='padding:20px;text-align:center'><h2>Hi I am some content built as a javascript variable!</h2><p><a href='#' class='cee_close'>Close Me</a></p></div>"

		$("#privacy").click(function(){
			$.fn.ceebox.overlay();
			$.fn.ceebox.popup(link1,{onload:true,htmlWidth:800,htmlHeight:600,textColor:'#919191',boxColor:'#1c1c1c'});
			return false;		  
		});

		$("#prodkey").click(function(){
			$.fn.ceebox.overlay();
			$.fn.ceebox.popup(link2,{onload:true,htmlWidth:800,htmlHeight:600,textColor:'#919191',boxColor:'#1c1c1c'});
			return false;		  
		});


	});	
    </script>
<link rel="stylesheet" href="http://www.footfall.ie/plugins/ceebox/css/ceebox.css" type="text/css" media="screen" />


<link href="http://www.footfall.ie/style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
@import "slidertron.css";
</style>
<script type="text/javascript"> 

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21582262-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
// Alt form validation
function validate(){
	if (document.getElementById('name').value ==""){
		alert("Please enter your name");
		return false;
	}
	if (document.getElementById('phone').value ==""){
		alert("Please enter a phone number");
		return false;
	}
	if (document.getElementById('email').value ==""){
		alert("Please enter a valid email address");
		return false;
	}
	
	return true;
	
	}

// Form Validation

function formCheck(formobj){
	var nbsp = 0;
	// Enter name of mandatory fields
	var fieldRequired = Array("name", "email", "phone", "tt_pass");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Name", "Contact Number", "Email", "Security Code");
	// dialog message
	var alertMsg = "Please complete the following fields:\n";

	var l_Msg = alertMsg.length;

	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null || obj.value == nbsp >= 1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){ 					if (obj[j].checked){ 						blnchecked = true; 					} 				} 				if (!blnchecked){ 					alertMsg += " - " + fieldDescription[i] + "\n"; 				} 			} 		} 	} 	if (alertMsg.length == l_Msg){ 		return true; 	}else{ 		alert(alertMsg); 		return false; 	} }

// Select Options
function setOptions(chosen){
	var selbox = document.myform.color;
	
	selbox.options.length = 0;
	if (chosen == " "){
		selbox.options[selbox.options.length] = new Option('Please select matting typ',' ');
	}
	
	
	if (chosen == "Prior"){
		selbox.options[selbox.options.length] = new Option(' ');
	}

	if (chosen == "Forma"){
		selbox.options[selbox.options.length] = new Option('Ammonite');		
		selbox.options[selbox.options.length] = new Option('Ash');
		selbox.options[selbox.options.length] = new Option('Bark');
		selbox.options[selbox.options.length] = new Option('Fern');
		selbox.options[selbox.options.length] = new Option('Lagoon');
		selbox.options[selbox.options.length] = new Option('Sand');
		selbox.options[selbox.options.length] = new Option('Twilight');
		selbox.options[selbox.options.length] = new Option('Volcano');
	}
	
	if (chosen == "Atrium Plus"){
		selbox.options[selbox.options.length] = new Option('Ammonite');		
		selbox.options[selbox.options.length] = new Option('Ash');
		selbox.options[selbox.options.length] = new Option('Bark');
		selbox.options[selbox.options.length] = new Option('Fern');
		selbox.options[selbox.options.length] = new Option('Lagoon');
		selbox.options[selbox.options.length] = new Option('Sand');
		selbox.options[selbox.options.length] = new Option('Twilight');
		selbox.options[selbox.options.length] = new Option('Volcano');
	}
	
	if (chosen == "Aluminium Profile"){
		selbox.options[selbox.options.length] = new Option('Black');
		selbox.options[selbox.options.length] = new Option('Grey');
	}

	if (chosen == "Coir Matting"){
		selbox.options[selbox.options.length] = new Option('Natural');		
		selbox.options[selbox.options.length] = new Option('Brown');
		selbox.options[selbox.options.length] = new Option('Black');		
	}

	if (chosen == "Wet Area Matting"){
		selbox.options[selbox.options.length] = new Option('White Dotted');
		selbox.options[selbox.options.length] = new Option('Beige');
		selbox.options[selbox.options.length] = new Option('Blue');
	}

	if (chosen == "Clean Room Matting"){
		selbox.options[selbox.options.length] = new Option('Grey');
		selbox.options[selbox.options.length] = new Option('Blue');
	}
	
	if (chosen == "Playground Surfaces"){
		selbox.options[selbox.options.length] = new Option('Red');
		selbox.options[selbox.options.length] = new Option('Green');
	}

}

function clearField(field){
field.value = "";
}
</script>

</head>
<body>
<!-- end #header-wrapper -->
<center>
<div class="page-wrapper">  
<div id="header">
	<div id="logo">
		<h1><a href="http://www.footfall.ie">Footfall</a></h1>
<p style="float: right; color: #FFF; font-size: 14pt; font-family: Arial, Helvetica, sans-serif;">01 803 5000<br />091 792 500</p>

		<p style="float: right;padding-right:30px;"><a href="http://www.footfall.ie/quote"><img src="http://www.footfall.ie/images/iquote.jpg" title="Click here for a quote" alt="Click here for a quote"/></a></p>
		<a name="top"></a>
	</div>
	<div id="menu">
<br /><br /><br /><br /><br /><br />
<ul id="sddm">
    <li><a href="http://www.footfall.ie/index.html" title="Footfall" onmouseover="mopen('m1')" onmouseout="mclosetime()">Home</a>
	<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
	<a href="http://www.footfall.ie/menus/home/about.html" >About</a>
	<a href="http://www.footfall.ie/menus/home/our-service.html">Our Service</a>
	<a href="http://www.footfall.ie/menus/home/news.html">News</a>
	<a href="http://www.footfall.ie/footfall-team">Footfall Team Gallery</a>	
	</div>     
    </li>        
    <li><a href="http://www.footfall.ie/entrance-mats.html" title="Entrance Mats" onmouseover="mopen('m2')" onmouseout="mclosetime()">Entrance Mats</a>
        <div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
        <a href="http://www.footfall.ie/menus/entrance-matting/exterior-matting.html">Exterior Matting</a>
		<a href="http://www.footfall.ie/menus/entrance-matting/interior-matting.html">Entrance Matting</a>
        <a href="http://www.footfall.ie/menus/entrance-matting/combination-matting.html">Combination Matting</a>
        <a href="http://www.footfall.ie/menus/entrance-matting/aluminium-profile.html">Aluminium Profile</a>
        <a href="http://www.footfall.ie/menus/entrance-matting/coir-matting.html">Coir Matting</a>
			<a href="http://www.footfall.ie/menus/entrance-matting/matwells-frames.html">Matwells / Frames</a>
			<a href="http://www.footfall.ie/downloads">Product Specifications</a>
			<a href="http://www.footfall.ie/gallery">Installation Photo Gallery</a>
        </div>
    </li>
   	<li><a href="http://www.footfall.ie/dust-mats.html" title="Dust Mats"
	   onmouseover="mopen('m3')" onmouseout="mclosetime()">Dust Mats </a>
        <div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
        <a href="http://www.footfall.ie/menus/dust-mats/education-mats.html">Education Mats</a>
        <a href="http://www.footfall.ie/menus/dust-mats/healthcare-matting.html">Healthcare Matting</a>
        <a href="http://www.footfall.ie/menus/dust-mats/hospitality.html">Hospitality</a>	
			</div>	 
		</li>  
    <li><a href="http://www.footfall.ie/safety-matting.html" title="Safety Matting"
	   onmouseover="mopen('m4')"onmouseout="mclosetime()">Safety Matting </a>
        <div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
        <a href="http://www.footfall.ie/menus/safety-matting/anti-fatigue-matting.html">Anti Fatigue Matting</a>
        <a href="http://www.footfall.ie/menus/safety-matting/anti-fatigue-wet-mats.html">Anti Fatigue Wet Mats</a>
        <a href="http://www.footfall.ie/menus/safety-matting/cleanroom-mats.html">Clean Room Mats</a>	
        <a href="http://www.footfall.ie/menus/safety-matting/wet-area-matting.html">Wet Area Matting</a>
        <a href="http://www.footfall.ie/menus/safety-matting/leisure-matting.html">Leisure Matting</a>
        <a href="http://www.footfall.ie/menus/safety-matting/playground-surface-matting.html">Playground Surface Matting</a>	
        <a href="http://www.footfall.ie/menus/safety-matting/lift-flooring.html">Lift Flooring</a>	
	</div> 
	</li>
    <li><a href="http://www.footfall.ie/logo-mats.html" title="Logo Mats" >Logo Mats</a></li>
       <li><a href="http://www.footfall.ie/carpet-tiles.html" title="Carpet Tiles">Carpet Tiles</a>
    <!--    <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
        <a href="http://www.footfall.ie/menus/carpet-tiles/premium-cut-pile-fusion-bonded.html">Premium Cut Pile Fusion Bonded</a>
        <a href="http://www.footfall.ie/menus/carpet-tiles/high-performance-loop-pile.html">High Performance Loop Pile</a>
        <a href="http://www.footfall.ie/menus/carpet-tiles/essentials-tufted-loop-pile.html">Essentials Tufted Loop Pile</a>
        <a href="http://www.footfall.ie/menus/carpet-tiles/healthcare.html">Healthcare</a>
	</div>
-->	
    </li>

            <li><a href="http://www.footfall.ie/contact.html" title="Contact Footfall" onmouseover="mopen('m6')" onmouseout="mclosetime()">Contact</a>
	<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
	<a href="http://www.footfall.ie/menus/contact/location.html"> Our Location</a>
	</div>
	</li>

<!--<li><a href="http://www.footfall.ie/shop" target="_blank" title="Footfall Online Shop" >Shop</a></li>-->
</ul>
<div style="clear:both"></div>

<!--	

		<ul>
			<li class="current_page_item"><a href="index.html" class="first">Home</a></li>
			<li><a href="#">Entrance Mats</a></li>
			<li><a href="#">Carpet Tiles</a></li>
			<li><a href="#">Dust Mats</a></li>
			<li><a href="#">Logo Mats</a></li>
			<li><a href="#">Safety Matting</a></li>
			<li><a href="#">News</a></li>
			<li><a href="#">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		</ul>
-->
	</div>
	<!-- end #menu -->
</div>
<!-- end #header -->
<hr />
<div id="wrapper">
	<!-- end #logo -->
<!-- <div class="navigation"> <a href="#" class="first">[ &lt;&lt; ]</a> &nbsp; <a href="#" class="previous">[ &lt; ]</a> &nbsp; <a href="#" class="next">[ &gt; ]</a> &nbsp; <a href="#" class="last">[ &gt;&gt; ]</a> </div> -->
<!--
	<div id="two-columns">
		<div class="col1">
			<div id="foobar">
				
				<div class="navigation"> <a href="#" class="first">[ First ]</a> &nbsp; <a href="#" class="previous">[ Previous ]</a> &nbsp; <a href="#" class="next">[ Next ]</a> &nbsp; <a href="#" class="last">[ Last ]</a> </div>
				<div class="viewer">
					<div class="reel">
						<div class="slide"> <img src="images/footfall1.jpg" alt=""> <span>Footfall Modular Matting carries a 5 year wear warranty.</span> </div>
						<div class="slide"> <img src="images/footfall2.jpg" alt=""> <span>Footfall Modular Matting carries a 5 year wear warranty.</span> </div>
						<div class="slide"> <img src="images/footfall3.jpg" alt=""> <span>Footfall Modular Matting carries a 5 year wear warranty.</span> </div>
					</div>
				</div>
			</div>
			<script type="text/javascript">

						$('#foobar').slidertron({
							viewerSelector:			'.viewer',
							reelSelector:			'.viewer .reel',
							slidesSelector:			'.viewer .reel .slide',
							navPreviousSelector:	'.previous',
							navNextSelector:		'.next',
							navFirstSelector:		'.first',
							navLastSelector:		'.last'
						});
						
					</script>
		</div> 
		<div class="col2">
			<blockquote>&#8220;&nbsp;The Most Effective Modular Matting System&nbsp;&#8221;</blockquote>
		</div>
	</div>
-->

</div>
<img src="http://www.footfall.ie/images/banners/online-quotes.jpg" alt="Footfall Modular Entrance Matting" title="Footfall Modular Entrance Matting" usemap="#mat"/><br />
	<map name="mat"> 
<!--	 <area shape="rect" coords="470,20,580,105" alt="Footfall Modular Entrance Matting" title="Click here to view the product key" href="#" onclick="javascript:window.open('http://www.footfall.ie/quote/product_key.html','_blank','width=600,height=600,scrollbars=yes','false');" /> -->
 <area shape="rect" coords="470,20,580,105" alt="Footfall Modular Entrance Matting" title="Click here to view the product key" href="#" rel="modal:false" id="prodkey" />   
	</map>

<div id="page">
	<div id="page-bgtop">
		<div id="content">

			<div class="post">
				<h2 class="title"><a name="#"></a></h2>   
				<div class="entry">
					<p>
				
				<!--
				<form method="post" action="quote_request.php" onsubmit="return formCheck(this)" name="myform" enctype="multipart/form-data">   
				<fieldset>
				<legend style="color: #FFFFFF;">Your Details:</legend>			
				
				<p><label>Full Name*:</label><input type="text" name="name" id="name" size="28"/></p>
				<p><label>Contact Number*:</label><input type="text" name="phone" id="phone" size="28"/></p>
				<p style="clear:left"><label>Email*:</label><input type="text" name="email" id="email" size="28"/></p>
				<p style="clear:left"><label>Company:</label><input type="text" name="company" size="28"/></p>
				
				</fieldset>
				
				<fieldset>
				<legend style="color: #FFFFFF;">Product Details:</legend>
				
				<p><label>Matting type required:</label></p>
				<p style="text-align:right;margin-right:10px;"><select name="matting" onchange="setOptions(document.myform.matting.options [document.myform.matting.selectedIndex].value);">
				<option value=" " selected="selected"> </option>
				<option value="Prior">Prior</option>				
				<option value="Forma">Forma</option> 
				<option value="Atrium Plus">Atrium Plus</option>
				<option value="Aluminium Profile">Aluminium Profile</option>
				<option value="Coir Matting">Coir Matting</option>
				<option value="Wet Area Matting">Wet Area Matting</option>
				<option value="Clean Room Matting">Clean Room Matting</option>
				<option value="Playground Surfaces">Playground Surfaces</option>
				</select></p>
				<p><label>Colour:</label>
				<select name="color">
				<option value=" " selected="selected">Please select matting type</option>
				</select></p>
				<label>Dimensions:</label>
				<label>Length (mm)&nbsp;</label><input type="text" name="length" size="5"/>
				<label>&nbsp;x Width (mm)&nbsp;</label><input type="text" name="width" size="5"/>
				<label>Depth (mm)&nbsp;&nbsp;</label><input type="text" name="depth" size="5"/>
				<label>Supply Only:&nbsp;&nbsp;</label><input type="checkbox" name="supplyonly" value="Yes"/>
				<label>Supply &amp; Install:&nbsp;&nbsp;</label><input type="checkbox" value="Yes" name="supplyfit" /><label>&nbsp;&nbsp;Site Location:&nbsp;&nbsp;</label>&nbsp;&nbsp;<input type="text" name="sitelocation" size="14" />
				<label>Comments:</label><textarea name="msg" cols="23" ></textarea>
				<label>Attach Photo (2MB MAX in JPG format):</label><input type="file" name="file" id="file" maxlength="50" accept="image/jpeg" />
				<img src="http://www.footfall.ie/captcha_image.php" width="150px;" height="45px"><br />
				<label>Security Code*:</label>&nbsp;<input name="tt_pass" type="text" size="10" maxlength="10">
				
				</fieldset>
				
				</form>
				-->
				
				
				<form method="post" action="quote_request.php" onsubmit="return formCheck(this)" name="myform" enctype="multipart/form-data">   
				<fieldset>
				<legend style="color: #FFFFFF;">Your Details:</legend>			
				<table border="0" cellpadding="2" cellspacing="2">  
				<tr>
				<td><label>Full Name*:</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="text" name="name" id="name" size="28" tabindex="1"/></td> 
				</tr>
				<tr>
				<td><label>Contact Number*:</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="text" name="phone" id="phone" size="28" tabindex="2"/></td>
				</tr> 
				<tr>
				<td><label>Email*:</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="text" name="email" id="email" size="28" tabindex="3"/></td>
				</tr> 
				<tr>
				<td><label>Company:</label></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><input type="text" name="company" size="28" tabindex="4"/></td>
				</tr>
				</table>
				</fieldset>
				<br />
				<fieldset>
				<legend style="color: #FFFFFF;">Product Details:</legend>
				<table border="0" cellpadding="2" cellspacing="2"> 
				<tr>
				<td><label>Matting type required:</label></td>
				<td>				
				<select name="matting" onchange="setOptions(document.myform.matting.options [document.myform.matting.selectedIndex].value);" tabindex="5">
				<option value=" " selected="selected"> </option>
				<option value="Prior">Prior</option>				
				<option value="Forma">Forma</option> 
				<option value="Atrium Plus">Atrium Plus</option>
				<option value="Aluminium Profile">Aluminium Profile</option>
				<option value="Coir Matting">Coir Matting</option>
				<option value="Wet Area Matting">Wet Area Matting</option>
				<option value="Clean Room Matting">Clean Room Matting</option>
				<option value="Playground Surfaces">Playground Surfaces</option>
				</select>
				</td></tr>
				<tr>
				<td><label>Colour:</label></td>
				<td>				
				<select name="color">
				<option value=" " selected="selected" tabindex="6">Please select matting type</option>
				</select>
				</td></tr>
				<tr>				
				<td><label>Dimensions:</label></td>
				<td>
				<!--<label>Length (mm) x Width (mm)</label>-->
				<input type="text" name="length" size="5" value="Length" onfocus="clearField(length)" tabindex="7"/>
				</td><td> x&nbsp; </td>
				<td>
				<input type="text" name="width" size="5" value="Width" onfocus="clearField(width)" tabindex="8"/>
				</td><td> x&nbsp; </td>
				<td>
				<input type="text" name="depth" size="5" value="Depth" onfocus="clearField(depth)" tabindex="9"/>
				</td>
				</tr>
				<!--
				<tr>
				<td></td>
				<td><label>Depth (mm)&nbsp;&nbsp;</label><input type="text" name="depth" size="5" tabindex="9"/></td>
				</tr>
				-->
				<tr><td><label>Supply Only:&nbsp;&nbsp;</label></td><td><input type="checkbox" name="supplyonly" value="Yes" tabindex="10"/></td></tr>
				
				<tr>
				<td><label>Supply &amp; Install:&nbsp;&nbsp;</label></td>
				<td><input type="checkbox" value="Yes" name="supplyfit" /><label>&nbsp;&nbsp;Site Location:&nbsp;&nbsp;</label>&nbsp;&nbsp;<input type="text" name="sitelocation" size="14" tabindex="11" /></td>
				</tr>
				
				<tr><td><label>Comments:</label></td><td><textarea name="msg" cols="23" tabindex="12" ></textarea></td></tr>
				<tr>
				<td><label>Attach Photo (2MB MAX in JPG format):</label></td>
				<td><input type="file" name="file" id="file" maxlength="50" accept="image/jpeg" tabindex="13"/></td>
				</tr>
				<tr>
				<td>
				<label>Security Code*:</label>
				</td>
				<td>
				<img src="http://demo.peterheylin.com/footfall/css/captcha_image.php" width="150px;" height="45px">
				<input name="tt_pass" type="text" size="10" maxlength="10" tabindex="14">
				</td>
				</tr>
				</table>				
				</fieldset>
				<br />
				
				<table border="0" cellpadding="2" cellspacing="2">
				<tr>				
				<td></td>
				<td><input type="submit" name="submit" value="Please send me a quote" tabindex="15" /></td>
				</tr>
				</table>				
				
				</form>	
				
				
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				<img src="http://www.footfall.ie/images/eurosign.jpg" alt="Footfall Price Promise" title="Footfall Price Promise" width="80px" height="80px"/><br />		
					The Footfall price promise is a guarantee that you will receive a highly competitive quote for Milliken Obex entrance matting.		
				</p>
				
				<p>
				Footfall Ltd will not share personal information with any 3rd party. 
				You may read our privacy policy by clicking 
				<!--
				<a href="#" onclick="javascript:window.open('http://www.footfall.ie/privacy.html','_blank','width=600,height=600,scrollbars=yes','false');">here</a><br />
				-->
				<a href="#" rel="modal:false" id="privacy">here</a>					
				</p>

				</div>
			</div>
			
		</div>
		
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
<table border="0"><tr><td><a href="http://www.footfall.ie/entrance-mats.html"><img src="http://www.footfall.ie/images/millikencarpet.jpg"/></a></td><td><a href="http://www.footfall.ie/menus/home/our-service.html#kuberit-profiles"><img src="http://www.footfall.ie/images/kuberit.jpg" /></a></td><td><a href="http://www.footfall.ie/menus/home/our-service.html#emery-tape"><img src="http://www.footfall.ie/images/3M2.jpg" /></a></td><td><a href="http://www.footfall.ie/menus/home/our-service.html#screeding"><img src="http://www.footfall.ie/images/instarmac.jpg" /></a></td><td><a href="http://www.footfall.ie/menus/safety-matting/cleanroom-mats.html"><img src="http://www.footfall.ie/images/dycem.jpg" /></a></td><td><a href="http://www.footfall.ie/menus/home/our-service.html#gradus-edging"><img src="http://www.footfall.ie/images/gradus.jpg" /></a></td></tr></table>
Tel: +353 (0)1 803 5000 / +353 (0)91 792 500 | Email: <a href="mailto:info@footfall.ie?subject=Enquiry from Website">info@footfall.ie</a> | Copyright &copy; 2011-2012 Footfall Ltd. All rights reserved. | <a href="http://www.footfall.ie/sitemap.html">Sitemap</a> | <a href="#" onclick="javascript:window.open('terms.html','_blank','width=600,height=600,scrollbars=yes','false');">Terms</a>

</div>
<!-- end #footer -->
</div>
</center>
</body>
</html>
