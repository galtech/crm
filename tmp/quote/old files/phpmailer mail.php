<?
include_once("/usr/sbin/sendmail -t -i");
// include_once("class.phpmailer.php");

$name = $_POST['name'];
$phone = $_POST['phone']; 
$email = $_POST['email'];
$company = $_POST['company'];
$mattype = $_POST['matting'];
$dimensions = $_POST['dimensions'];
$supplyonly = $_POST['supplyonly'];
$supplyfit = $_POST['supplyfit'];
$msg = $_POST['msg'];

$body = "Sender: " . $name . "\n\nPhone: " . $phone . "\n\nEmail: " . $email . "\n\nCompany: " . $company . "\n\nMat Type: " . $mattype . "\n\nDimensions: " . $dimensions . "\n\nSupply Only: " . $supplyonly . "\n\nSupply & Install: " . $supplyfit . "\n\nComments:\n\n" . $msg;

$mail = new PHPMailer;
$mail->ClearAddresses();
$mail->AddAddress('peter@peterheylin.com', 'Peter Heylin');
$mail->From = 'info@peterheylin.com';
$mail->FromName = 'Peter Heylin';
$mail->Subject = 'Quote Me Please';
$mail->Body = $body;
if ($mail->Send()){
	echo "Message sent";
}else{
	echo "Error: Message not sent\n";
	echo $mail->ErrorInfo;
}
?>