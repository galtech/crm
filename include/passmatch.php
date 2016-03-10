<?php

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$passmatch = strcmp($password1,$password2);

if ($password1 == $password2){
	echo "<p style='color:#00ff00;'>passwords match</p>";
}else{
	echo "<p style='color:#ff0000;'>passwords do not match</p>";
}

?>