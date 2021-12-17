
<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


if(isset($_POST['submit'])){
    $voornaam = htmlspecialchars($_POST['voornaam']);
    $achternaam = htmlspecialchars($_POST['achternaam']);
    $straat = htmlspecialchars($_POST['straat']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $woonplaats = htmlspecialchars($_POST['woonplaats']);
    $email = htmlspecialchars($_POST['e-mail']);
    // $sql = "UPDATE album SET 'titel' = ?, 'artiest' = ?, 'genre' = ?, 'prijs' = ? WHERE 'ID' = ?";  //boek versie
    // $sql = "UPDATE album SET titel = '?', artiest = '?', genre = '?', prijs = '?' WHERE ID = '?'";  // w3c versie
    $sql = "UPDATE klant SET voornaam = ?, achternaam = ?, straat = ?, postcode = ?, woonplaats = ?, email = ? WHERE email = ?"; 
    // $sql = "UPDATE album SET $titel='$_POST[titel]', $artiest='$_POST[artiest]', $genre='$_POST[genre]', $prijs='$_POST[prijs]'  WHERE 'ID' = ?"; // youtube/julian versie
    $stmt = $verbinding->prepare($sql);
    try 
    {
        
        echo "<div class='gelukt'>
        <h1>het is je gelukt!</h1>
        
        </div>";
        $stmt = $stmt->execute(array($voornaam, $achternaam, $straat, $postcode, $woonplaats, $email, $email)); // , $id
        // $stmt = $stmt->execute($sql);
        // echo "<script> alert('Album is geupdated.'); location.href='index.php?page=albums';</script>";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>