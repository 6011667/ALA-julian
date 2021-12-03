
<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


if(isset($_POST['submit'])){
    $id = htmlspecialchars($_POST['id']);
    $naam = htmlspecialchars($_POST['naam']);
    $omschrijving = htmlspecialchars($_POST['omschrijving']);
   // // $soort = htmlspecialchars($_POST['soort']);
     // // $prijs = htmlspecialchars($_POST['prijs']);
    // $sql = "UPDATE album SET 'titel' = ?, 'artiest' = ?, 'genre' = ?, 'prijs' = ? WHERE 'ID' = ?";  //boek versie
    // $sql = "UPDATE album SET titel = '?', artiest = '?', genre = '?', prijs = '?' WHERE ID = '?'";  // w3c versie
    //$sql = "UPDATE producten SET productennaam = ?, beschrijving = ?, soort = ?, prijs = ? WHERE ID = ?";  // werkende versie
    $sql = "UPDATE categorie SET naam = ?, omschrijving = ? WHERE ID = ?";   // , soort = ?, prijs = ?
    // $sql = "UPDATE album SET $titel='$_POST[titel]', $artiest='$_POST[artiest]', $genre='$_POST[genre]', $prijs='$_POST[prijs]'  WHERE 'ID' = ?"; // youtube/julian versie
    $stmt = $verbinding->prepare($sql);
    try 
    {
        echo $id;
        print_r($_POST);
        $stmt = $stmt->execute(array($naam, $omschrijving, $id)); // , $id      //  $soort, $prijs,
        // $stmt = $stmt->execute($sql);
        // echo "<script> alert('Album is geupdated.'); location.href='index.php?page=albums';</script>";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }



  
}
?>