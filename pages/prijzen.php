


<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


$sql = "SELECT * FROM product WHERE categorie_ID = 1";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$categorien = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($categorien as $categorie){
    ?>
<div class="content">
    <form action="index.php?page=prijzen_update" name="edit" class="form" method="POST">

    <p id="page_titel">Producten aanpassen</p>



<?php
$sql = "SELECT * FROM categorie WHERE ID = ?";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($_GET['id']));
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($namen as $naam){
echo $naam['naam'];
}
?>


 
    <input type="hidden" name="id" id="id" value=" <?php  echo $categorie['ID'];?> "/>
    <label >prijs:</label>
    <input type="text" name="prijs" id="prijs" value="<?php  echo $categorie['prijs'];?>" />
    <!-- <label >beschrijving:</label> -->
    <!-- <input type="text" name="omschrijving" id="omschrijving" value="<?php // echo $categorie['formaat_ID'];?>"> -->
    

<?php
}
?>

    <br>
    <div class="icon_container">
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
    </div>
    
</form>
</div>

