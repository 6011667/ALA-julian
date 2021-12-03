<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" name="Wachtwoord vergeten" method="POST" enctype="multipart/form-data">
    <p>Nieuw wachtwoord aannvragen</p>
    <input type="email" required name="e-mail" placeholder="e-mail" />
    <div>
        <input type="submit" name="submit" id="submit" value="&rarr;">
    </div>
    <a href="../index.php?page=inloggen">Terug</a>
    </form>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $melding = "";
    $email = htmlspecialchars($_POST['e-mail']);

    // hier generee ik een token en een timestamp
    $token = bin2hex(random_bytes(32));
    $timestamp = new Datetime("now");
    $timestamp = $timestamp->getTimestamp();
    // hier sla ik het token voor deze klant in de db op
    include('../DBconfig.php');
    try {
        $sql = "UPDATE klant SET token = ? WHERE email = ?";
        $stmt = $verbinding->prepare($sql);
        $stmt = $stmt->execute(array($token, $email));
        if(!$stmt){
            echo "<script> alert('kon niet opslaan in database'); location.href='../index.php?page=inloggen';</script>";
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
}
// hier configureren we de URL van de wachtwoord_resetten pagina
$url = sprintf("%s://%s",isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off'?'https' :'http',$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF'])."/wachtwoord_resetten.php");
// hier voegen we het token en de timestamp aan de URL toe
$url = $url. "?token=".$token."&timestamp=".$timestamp;

//hier mailen we de url naar de klant

$onderwerp = "Wachtwoord resetten";
$bericht = "<p> ALs je je wachtwoord wilt resetten klik <a href=". $url.">hier</a></p>";
try {
    mailen($email, "klant", $onderwerp, $bericht);
    $melding = 'open je mail om verder te gaan.';
}catch(Exception $e){
    $melding = 'kon geen mail versturen - ' + $mail->ErrorInfo;
}

