

<form action="" method="post">
    <p>wachtwoord resetten</p>
    <input required-type="email" name="e-mail" placeholder="bij@voorbeeld.com" /><br>
    <input type="password" name="wachtwoord" placeholder="Nieuw wachtwoord" /><br>
   
    <div>
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
    </div>    
    </form>




<?php

    if (isset($_POST['submit'])){
        

$email = htmlspecialchars($_POST["e-mail"]);
$wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
$wachtwoordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);


try{


$query = "UPDATE klant SET wachtwoord = ? WHERE email = ?";
                    $stmt = $verbinding->prepare($query);
                    $stmt = $stmt->execute(array($wachtwoordHash, $email));
                    if($stmt){
                        print_r($_POST);
                        echo "het is je gelukt";
                    }
}catch(PDOException $e){
    echo $e->getMessage();
}
    }