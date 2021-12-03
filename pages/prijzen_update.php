
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
    // $naam = htmlspecialchars($_POST['naam']);
    // $omschrijving = htmlspecialchars($_POST['omschrijving']);

    $prijs =  htmlspecialchars($_POST['prijs']);


 
    $sql = "UPDATE product SET prijs = ? WHERE ID = ?";   // , soort = ?, prijs = ?   WHERE ID = ?
    // $sql = "UPDATE album SET $titel='$_POST[titel]', $artiest='$_POST[artiest]', $genre='$_POST[genre]', $prijs='$_POST[prijs]'  WHERE 'ID' = ?"; // youtube/julian versie
    $stmt = $verbinding->prepare($sql);
    try 
    {
        // echo $id;
        print_r($_POST);
        $stmt = $stmt->execute(array($prijs, $id)); // , $id      //  $soort, $prijs, , $omschrijving, $id
        // $stmt = $stmt->execute($sql);
        // echo "<script> alert('Album is geupdated.'); location.href='index.php?page=albums';</script>";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }



  
}
?>