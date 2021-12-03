

<?php

$name = $SESSION['USER_NAAM'];
$email= $_SESSION['email'];
$message= $_POST['message'];
$datum = date("Y/m/d") ;
$sql = $verbinding->prepare("SELECT * FROM weborder WHERE ID = ID");
$sql->execute();
$probeersel = $sql->fetch(PDO::FETCH_ASSOC);
 $ordernummer = $probeersel['ID'];



$to = "julian@elderson.eu";
$subject = "Mail met factuur";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n datum =" . $datum . "\r\n orderNR =" . $ordernummer;
$headers = "From: julian@elderson.eu" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:mailDankje.php");
?>