<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


$sql = "SELECT * FROM klant WHERE ID = ?";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($_GET['id']));
$klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($klanten as $klant){
    ?>
<div class="content">
    <form action="index.php?page=klant_update" name="edit" class="form" method="POST">

    <p id="page_titel">Edit klanten</p>
 
    <input type="hidden" name="id" id="id" value=" <?php echo $klant['ID'];?>" />
    <label >voornaam:</label>
    <input type="text" name="voornaam" id="voornaam" value="<?php echo $klant['voornaam'];?>" />
    <label >Achternaam:</label>
    <input type="text" name="achternaam" id="achternaam" value="<?php echo $klant['achternaam'];?>">
    <label >straat:</label>
    <input type="text" name="straat" id="straat" value="<?php echo $klant['straat'];?>">
    <label >postcode:</label>
    <input type="text" name="postcode" id="postcode" value="<?php echo $klant['postcode'];?>">
    <label >woonplaats:</label>
    <input type="text" name="woonplaats" id="woonplaats" value="<?php echo $klant['woonplaats'];?>">
    <label >email:</label>
    <input type="email" name="e-mail" id="e-mail" value="<?php echo $klant['email'];?>">
    <label >rol:</label>
    <input type="text" name="rol" id="rol" value="<?php echo $klant['rol'];?>">
    <br>
    <div class="icon_container">
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
    </div>
    <a href="index.php?page=klanten">Terug</a>
</form>
</div>
<?php
}
?>
