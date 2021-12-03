<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


if(isset($_POST['submit'])){
    // $id = htmlspecialchars($_POST['id']);
    $voornaam = htmlspecialchars($_POST['voornaam']);
    $achternaam = htmlspecialchars($_POST['achternaam']);
    $straat = htmlspecialchars($_POST['straat']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $woonplaats = htmlspecialchars($_POST['woonplaats']);
    $email = htmlspecialchars($_POST['e-mail']);
    $rol = htmlspecialchars($_POST['rol']);
    $sql = "UPDATE klant SET voornaam = ?, achternaam = ?, straat = ?, postcode = ?, woonplaats = ?, email = ?, rol = ? WHERE email = ?";
    $stmt = $verbinding->prepare($sql);
    try {
        print_r($_POST);
        $stmt = $stmt->execute(array( $voornaam, $achternaam, $straat, $postcode, $woonplaats, $email,$rol, $email ));
        // echo "<script> alert('klant is geupdated.'); location.href='index.php?page=klanten';</script>";
        
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
