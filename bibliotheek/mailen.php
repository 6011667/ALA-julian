<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
//deze function stuurt emails via gmail
function mailen($ontvangerStraat, $ontvangerNaam, $onderwerp, $bericht){

$mail = new PHPMailer();

//verbinden met gmail 
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMPTSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;

//identificeer jezelf bij gmail
$mail->Username = "6011667mborijnland@gmail.com";
$mail->Password = "gole-JAE-0804";

//email opstellen
$mail->isHTML(true);
$mail->SetFrom("6011667mborijnland@gmail.com", "Julians Pizza");
$mail->Subject = $onderwerp;
$mail->CharSet = 'UTF-8';
$bericht = "<body style=\"font-family: verdana, Verdana, Geneva, sans-serif; font-size: 14px; color: #000;\">".
$bericht . "</body></html>";
$mail->AddAddress($ontvangerStraat, $ontvangerNaam);
$mail->Body = $bericht;

//stuur mail
if($mail->Send()){
echo "<script>alert('factuur is verstuurd');</script>";
}
else{
echo $mail->ErrorInfo;
echo "<script>alert('kon geen mail versturen');</script>";
}
}
?>