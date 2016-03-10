<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();

// include("http://www.footfall.ie/crm/include/dbinfo.inc.php");
// include("http://demo.peterheylin.com/footfall/footfallcrm/1.6/include/dbinfo.inc.php");
include("../../footfallcrm/1.6/include/dbinfo.inc.php");

/*
if ((($_FILES["file"]["type"] == "image/jpeg"))
&& ($_FILES["file"]["size"] < 2000000)) 
  { 
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "/content/Hosting/f/o/www.footfall.ie/web/quote/files/" . $_FILES["file"]["name"]);
 //     echo "Stored in: " . "/content/Hosting/f/o/www.footfall.ie/web/quote/files/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
//  echo "Invalid file / file not found";
//  echo "<br />";
  }
*/ 

$fullname = $_POST['name']; 
$telephone = $_POST['phone'];  
$email = $_POST['email'];
$company = $_POST['company'];
$matting = $_POST['matting'];
$color = $_POST['color']; 
$length = $_POST['length'];
$width = $_POST['width']; 
$depth = $_POST['depth']; 
$supplyonly = $_POST['supplyonly'];
$supplyfit = $_POST['supplyfit']; 
$sitelocation = $_POST['sitelocation'];
$comments = $_POST['msg']; 

$to = "sysadmin@footfall.ie";
$subject = "Please Quote Me";
 
$mail_from = "web@footfall.ie";
$headers = "From: $name <$mail_from>";  


$body = "Sender: " . $name . "\n\nPhone: " . $phone . "\n\nEmail: " . $email . "\n\nCompany: " . $company . "\n\nMat Type: " . $matting . "\n\nColour: " . $color . "\n\nDimensions:  Length: " . $length . " x Width: " . $width . "\n\nSupply Only: " . $supplyonly . "\n\nSupply & Install: " . $supplyfit . " Site Location: " . $sitelocation . "\n\nComments:\n\n" . $msg . "\n\nAttachment:" . $_FILES["file"]["name"];

if ($_REQUEST["tt_pass"]){
        if ($_REQUEST["tt_pass"] == $_SESSION["tt_pass"]){  
  
					if (mail($to, $subject, $body, $headers, $messages)){
						
						mysql_connect($server,$username,$password);
						@mysql_select_db($database) or die( "Unable to select database");
						
						$query = "INSERT INTO enquiries VALUES ('', '$fullname', '$telephone', '$email', '$company', '$matting', '$color', '$length', '$width', '$depth', '$supplyonly', '$supplyfit', '$sitelocation', '$comments')";
						mysql_query($query);
						
						mysql_close();
						header("Location:http://www.footfall.ie/thankyou.html","false");
					
					}else{ 
						header("Location:http://www.footfall.ie/error-pages/mail_error.html","false");
					
					}  

		}else{					
				//  echo "code does not match";
				header("Location:http://www.footfall.ie/error-pages/code_error.html","false");
			}
}else{
//	echo "code not found";
header("Location:http://www.footfall.ie/quote/index.php","false"); 
}
					
?> 
