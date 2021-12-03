<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}

?>
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
        <form action="" name="resetformulier" method="POST" enctype="multipart/form-data" onsubmit="
        if(document.resetformulier.wachtwoord1 !== document.resetformulier.wachtwoord2){
        alert('wachtwoorden moeten gelijk zijn '); return false;">
    <p>wachtwoord resetten</p>
    <input required-type="email" name="e-mail" placeholder="bij@voorbeeld.com" /><br>
    <input type="password" name="wachtwoord1" placeholder="Nieuw wachtwoord" /><br>
    <input type="password" name="wachtwoord2" placeholder="herhaal nieuw wachtwoord" /> <br>
    <div>
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
    </div>    
    </form>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    if(isset($_GET["token"]) && isset($_GET["timestamp"])){
        $token = $_GET["token"];
        $timestamp1 = $_GET["timestamp"];
        $melding = "";
        // zoek in de database de e-mail en het token uit de link
        include("../DBconfig.php");
        $email = htmlspecialchars($_POST["e-mail"]);
        $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
        $wachtwoordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);
        try {
            $sql = "SELECT * FROM klant WHERE email = ? AND token = ?";
            $stmt = $verbinding->prepare($sql);
            $stmt->execute(array($email, $token));
            $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
            // hier controleer ik of de link verlopen is
            if($stmt){
                $timestamp2 = new DateTime("now");
                $timestamp2 = $timestamp2->getTimestamp();
                $dif = $timestamp2 - $timestamp1;
                // als de link geldig is sla ik het nieuwe wachtwoord op
                if(($timestamp2 - $timestamp1) < 43200){
                    $query = "UPDATE klant SET 'wachtwoord' = ? WHERE 'email' = ?";
                    $stmt = $verbinding->prepare($query);
                    $stmt = $stmt->execute(array($wachtwoordHash, $email));
                    if($stmt){
                        print_r($_POST);
                        

                    }
                }else{
                    echo "<script>alert('link is verlopen'); location.href='../index.php';</script>";
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>