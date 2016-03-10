<?php
$name = $_POST['name'];
$phone = $_POST['phone']; 
$email = $_POST['email'];
$company = $_POST['company'];
$mattype = $_POST['matting'];
$color = $_POST['color'];
$dimensions = $_POST['dimensions'];
$supplyonly = $_POST['supplyonly'];
$supplyfit = $_POST['supplyfit'];
$msg = $_POST['msg'];
$attachment = $_POST['file'];

$to = "peter@peterheylin.com,$email";
$subject = "Please Quote Me";

/* 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$msg = $_POST['msg'];
*/
$mail_from = "info@peterheylin.com";
$headers = "From: $fname $lname <$mail_from>"; 



// $body = "Sender: " . $fname . " " . $lname . "\n\nEmail: " . $email . "\n\nMessage:\n\n" . $msg;
$body = "Sender: " . $name . "\n\nPhone: " . $phone . "\n\nEmail: " . $email . "\n\nCompany: " . $company . "\n\nMat Type: " . $mattype . "\n\nColour: " . $color . "\n\nDimensions: " . $dimensions . "\n\nSupply Only: " . $supplyonly . "\n\nSupply & Install: " . $supplyfit . "\n\nMessage:\n\n" . $msg . "\n\nAttachment" . $attachment;

if (mail($to, $subject, $body, $headers, $message)) {
//  header("Location: sent.html");

if ((($_FILES["file"]["type"] == "image/jpeg"))
&& ($_FILES["file"]["size"] < 2000000)) 
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    /*
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	*/
	header("Location: sent.html");	
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "/content/Hosting/f/o/www.footfall.ie/web/quote/files/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "/content/Hosting/f/o/www.footfall.ie/web/quote/files/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file / or no file uploaded.";
  header("Location: sent.html");
  }

 }
else { header("Location: error.html"); } 
?>