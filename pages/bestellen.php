<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


// if(isset($_POST["bestellen"])){
//     // weborder aanmaken
//     $datum = new DateTime();
//     $datum = date_format($datum, "c");
//     $sql = "INSERT INTO weborder (ID, klant_ID, datum) values (?,?,?)";
//     $stmt = $verbinding->prepare($sql);
//     // session_start();
//     $data = array(NULL, $_SESSION["USER_ID"], $datum);
//     try {
//         $stmt->execute($data);
//         echo "<script> alert('bestelling aangemaakt.');</script>";
//     }catch(PDOException $e){
//         echo $e->getMessage();
//         echo "<script> alert('kon geen bestelling aanmaken');</script>";
//             echo "<script> location.href='index.php?page=webshop';</script>";
//     }

//     // haal de weborder_id uit de laatste bestelling
//     $weborder_id = $verbinding->lastInsertId();
//     // items opslaan
//     for($x=0; $x < 0; $x++){
//         $aantal = htmlspecialchars($_POST['aantal'][$x]);
//         if($aantal == 0) continue;
//         $album_id = $_POST['id'][$x];
//         $prijs_eenheid = $_POST['keuze'][$x];
//         $sql = "INSERT INTO item (ID, weborder_ID, klant_ID, album_ID, prijs_eenheid, aantal) values (?,?,?,?,?,?)";
//         $stmt = $verbinding->prepare($sql);
//         $data = array(NULL, $weborder_id, $_SESSION["USER_ID"], $album_id, $prijs_eenheid, $aantal);
//         try{
//             $stmt->execute($data);
//             echo "<script> alert('item opgeslagen');</script>";
//             // echo "<script> location.href='facturering.php';</script>";
//         }catch(PDOException $e){
//             echo $e->getMessage();
//             echo "<script> alert('kon geen item opslaan ');</script>";
//         }
//         echo "<script> location.href='index.php?page=webshop';</script>";
//     }
// }
?>



<?php

if( isset($_POST['bestellen'])){

    $voornaam = htmlspecialchars($_POST['voornaam']);
    $achternaam = htmlspecialchars($_POST['achternaam']);
    $straat = htmlspecialchars($_POST['straat']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $woonplaats = htmlspecialchars($_POST['woonplaats']);
    $email = htmlspecialchars($_POST['e-mail']);



    // weborder aanmaken
    $datum = new DateTime();
    $datum = date_format($datum, "c");
    $sql = "INSERT INTO weborder (ID, klant_ID, voornaam, achternaam, straat, postcode, woonplaats, email) values (?,?,?,?,?,?,?,?)";
    $stmt = $verbinding->prepare($sql);
    // session_start();
    $klantid = $_SESSION["USER_ID"];
    $data = array(NULL, $klantid, $voornaam, $achternaam, $straat, $postcode, $woonplaats, $email);
    try {
        print_r($data);
        $stmt->execute($data);
        echo "<script> alert('bestelling aangemaakt.');</script>";
    }catch(PDOException $e){
        echo $e->getMessage();
        echo "<script> alert('kon geen bestelling aanmaken');</script>";
            echo "<script> location.href='index.php?page=webshop';</script>";
    }

  // unset( $_SESSION['winkelwagen'] );


    
    // // haal de weborder_id uit de laatste bestelling
    // $weborder_id = $verbinding->lastInsertId();
    // // items opslaan
    // for($x=0; $x < 0; $x++){
    //     $aantal = htmlspecialchars($_POST['aantal'][$x]);
    //     if($aantal == 0) continue;
    //     $product_id = $_POST['id'][$x];
    //     $prijs_eenheid = $_POST['keuze'][$x];
    //     $sql = "INSERT INTO item (ID, weborder_ID, klant_ID, product_ID, prijs_eenheid, aantal) values (?,?,?,?,?,?)";
    //     $stmt = $verbinding->prepare($sql);
    //     $data = array(NULL, $weborder_id, $_SESSION["USER_ID"], $product_id, $prijs_eenheid, $aantal);
    //     try{
    //         $stmt->execute($data);
    //         echo "<script> alert('item opgeslagen');</script>";
    //         // echo "<script> location.href='facturering.php';</script>";
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         echo "<script> alert('kon geen item opslaan ');</script>";
    //     }
    //     echo "<script> location.href='index.php?page=webshop';</script>";
    // }


    

    $weborder_id = $verbinding->lastInsertId();
    $aantal = $value;
    $product_id = $_POST['id'];
    $prijs_eenheid = $product['prijs'];
    



    $sql = "INSERT INTO item (ID, weborder_ID, klant_ID, product_ID, prijs_eenheid, aantal) values (?,?,?,?,?,?)";
    $stmt = $verbinding->prepare($sql);
    $data = array(NULL, $weborder_id, $_SESSION["USER_ID"], $product_id, $prijs_eenheid, $aantal);

    try{
        $stmt->execute($data);
        echo "<script> alert('item opgeslagen');</script>";
        // echo "<script> location.href='facturering.php';</script>";
    }catch(PDOException $e){
        echo $e->getMessage();
        echo "<script> alert('kon geen item opslaan ');</script>";
    }
    echo "<script> location.href='index.php?page=webshop';</script>";







    unset( $_SESSION['winkelwagen'] );
}