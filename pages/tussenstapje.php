<?php
$sql = "SELECT * FROM klant WHERE email = ?";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($_SESSION["E-MAIL"]));
$resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($resultaten as $resultaat){
    ?>
<div class="content">
    <form action="index.php?page=bestellen" name="edit" class="form" method="POST">

    <p id="page_titel">Edit profiel</p>
 
    <!-- <input type="hidden" name="id" id="id" value=" <?php //echo $resultaat['ID'];?> "/> -->
    <label >voornaam:</label>
    <input type="text" name="voornaam" id="voornaam" value="<?php  echo $resultaat['voornaam'];?>" />
    <label >achternaam:</label>
    <input type="text" name="achternaam" id="achternaam" value="<?php echo $resultaat['achternaam'];?>">
    <label >straat:</label>
    <input type="text" name="straat" id="straat" value="<?php echo $resultaat['straat'];?>">
    <label >huisnummer:</label>
    <input required-type="text" name="huisnummer" id="huisnummer" value="<?php echo $resultaat['huisnummer'];?>">
    <label >postcode:</label>
    <input type="text" name="postcode" id="postcode" value="<?php echo $resultaat['postcode'];?>">
    <label >woonplaats:</label>
    <input type="text" name="woonplaats" id="woonplaats" value="<?php echo $resultaat['woonplaats'];?>">
    <label >email:</label>
    <input type="email" name="e-mail" id="e-mail" value="<?php echo $resultaat['email'];?>">
    <br>
    <div class="icon_container">
        <input type="submit" class="icon" id="submit" name="submit" value="&rarr;" />
    </div>
    <a href="index.php?page=webshop">Terug</a>
</form>
</div>
<?php
}


if(isset($_POST['submit'])){
    $voornaam = htmlspecialchars($_POST['voornaam']);
    $achternaam = htmlspecialchars($_POST['achternaam']);
    $straat = htmlspecialchars($_POST['straat']);
    $huisnummer = htmlspecialchars($_POST['huisnummer']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $woonplaats = htmlspecialchars($_POST['woonplaats']);
    $email = htmlspecialchars($_POST['e-mail']);
    // $sql = "UPDATE album SET 'titel' = ?, 'artiest' = ?, 'genre' = ?, 'prijs' = ? WHERE 'ID' = ?";  //boek versie
    // $sql = "UPDATE album SET titel = '?', artiest = '?', genre = '?', prijs = '?' WHERE ID = '?'";  // w3c versie
    // $sql = "UPDATE klant SET voornaam = ?, achternaam = ?, straat = ?, postcode = ?, woonplaats = ?, email = ? WHERE email = ?"; 
    $sql = "INSERT INTO weborder(voornaam, achternaam, straat, huisnummer, postcode, woonplaats, email) VALUES(?,?,?,?,?,?,? )";
    // $sql = "UPDATE album SET $titel='$_POST[titel]', $artiest='$_POST[artiest]', $genre='$_POST[genre]', $prijs='$_POST[prijs]'  WHERE 'ID' = ?"; // youtube/julian versie
    $stmt = $verbinding->prepare($sql);
    try 
    {
        
        print_r($_POST);
        $stmt = $stmt->execute(array($voornaam, $achternaam, $straat, $huisnummer, $postcode, $woonplaats, $email, $email)); // , $id
        // $stmt = $stmt->execute($sql);
        // echo "<script> alert('Album is geupdated.'); location.href='index.php?page=albums';</script>";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>