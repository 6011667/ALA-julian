
<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


$sql = "SELECT * FROM klant WHERE email = ?";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($_SESSION["E-MAIL"]));
$resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($resultaten as $resultaat){
    ?>
<div class="content">
    <form action="index.php?page=profiel_update" name="edit" class="form" method="POST">

    <p id="page_titel">Edit profiel</p> <a href="index.php?page=nieuwwachtwoord">verander je wacht woord hier</a>
 
    <!-- <input type="hidden" name="id" id="id" value=" <?php //echo $resultaat['ID'];?> "/> -->
    <label >voornaam:</label>
    <input type="text" name="voornaam" id="voornaam" value="<?php  echo $resultaat['voornaam'];?>" />
    <label >achternaam:</label>
    <input type="text" name="achternaam" id="achternaam" value="<?php echo $resultaat['achternaam'];?>">
    <label >straat:</label>
    <input type="text" name="straat" id="straat" value="<?php echo $resultaat['straat'];?>">
    <label >postcode:</label>
    <input type="text" name="postcode" id="postcode" value="<?php echo $resultaat['postcode'];?>">
    <label >woonplaats:</label>
    <input type="text" name="woonplaats" id="woonplaats" value="<?php echo $resultaat['woonplaats'];?>">
    <label >email:</label>
    <input type="email" name="e-mail" id="e-mail" value="<?php echo $resultaat['email'];?>">
    <br>
    <div class="icon_container">
        <input class="bevestigenIcon" type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
    </div>
    <a href="index.php?page=webshop">Terug</a>
</form>
</div>
<?php
}
?>
