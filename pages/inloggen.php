<!-- dit is het form waarbij ik 2 velden maak, eentje voor het emaiil adress waarmee je geregistreerd hebt en eentje voor je wachtwoord   we gebruiken hier de methode post -->
<div class="content">
    <form class="inlogFormulier" name="inloggen" method="POST" enctype="multipart/formdata" action="">
        <p>Om deze website te gebruiken dient u ingelogd klant te zijn.</p>
<p id="page_titel">Inloggen</p>
<input class="inputVeld" required type="email" name="e-mail" placeholder="bij@voorbeeld.nl" />
<input class="inputVeld" required type="password" name="wachtwoord" placeholder="wachtwoord" />
<div class="icon_container">
<!-- dit is de login knop -->
    <input type="submit" class="bevestigenIcon" id="submit" name="submit" value="&rarr;" />     
</div>
<a class="inlogLinks" href="registreren.php">Registreren</a><br>
<a class="inlogLinks" href="wachtwoord_vergeten.php"> Wachtwoord vergeten</a>
</form>
</div>
<?php
if(isset($_POST["submit"])){              // als de log in knop is ingedrukt 
    $melding = "";
    $email = htmlspecialchars($_POST["e-mail"]);            // dan haalt hij hier de post op (wat de gebruiker invuld in het invulveld)
    $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
    try{
        $sql = "SELECT * FROM klant WHERE email = ?";             
        $stmt = $verbinding->prepare($sql);
        $stmt->execute(array($email));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat){                                                     // hier kijk ik of het wachtwoord klopt
            $wachtwoordInDatabase = $resultaat["wachtwoord"];
            $rol = $resultaat["rol"];
            if(password_verify($wachtwoord,$wachtwoordInDatabase)){
                $_SESSION["ID"] = session_id();                                        // hier stop ik de gegevens  van de gebruiker die net inlogt in de sessie
                $_SESSION["USER_ID"] = $resultaat["ID"];
                $_SESSION["USER_NAAM"] = $resultaat["voornaam"];
                $_SESSION["E-MAIL"] = $resultaat["email"];
                $_SESSION["STATUS"] = "ACTIEF";
                $_SESSION["ROL"] = $rol;

                if($rol == 0){                                                     // hier kijk ik of de gebruiker een gast of een admin is of dat de gebruiker geblokkeerd is
                    header('Location: index.php?page=webshop');

                }elseif ($rol == 1){
                    header('Location: index.php?page=producten');
                }
                elseif ($rol == 2){ 
                    $melding .= "uw account is geblokkeerd";
                }else{
                    $melding .= "toegang geweigerd<br>";
                }
            } else {                                                           // als het wachtwoord of de rol ongeldig is krijg je de melding. probeer nogmaals in te loggen
                $melding = "probeer nogmaals in te loggen<br>";

            }
            
        } else {
            $melding.= "probeer nogmaals in te loggen<br>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();                                 
    }
    echo "<div id='melding'>$melding</div>";              // op basis van je rol of foute wachtwoord/email krijg je een melding 
}
?>