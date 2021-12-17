<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}
include("bibliotheek/mailen.php");

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
        // print_r($data);
        $stmt->execute($data);
        echo "<script> alert('bestelling aangemaakt!');</script>";
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

    $weborder_id = $verbinding ->lastInsertId();

    $totaal = 0;

    // hier zet ik alvast de tekst klaar die niet herhaald moet worden
    $eindbericht = "<h2> Beste ". $_SESSION['USER_NAAM'] .", <br> bedankt voor je bestelling bij Julian's pizza! de factuur is hieronder gedeeld</h2> <hr />";

    foreach ( $_SESSION['winkelwagen'] as $key => $value ) {
        // echo 'pizza '.$key. " ". $value. " stuks<br>";
    
        $querys = "SELECT * FROM product  WHERE ID = ?";
    
        $stmt = $verbinding->prepare($querys);
        $stmt->execute(array($key));
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // print_r($product);
    
        $categorie_query = "SELECT * FROM categorie WHERE ID = ?";
        $stmt = $verbinding->prepare($categorie_query);
        $stmt->execute(array($product['categorie_ID']));
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
        $subtotaal = $product["prijs"] * $value ; 
        // $totaal = 0;
        
    
        $subtotaal = $product["prijs"] * $value ; 
        $totaal += $subtotaal;
        
        
        // echo '<form type="hidden" method="post" class="winkelmandje"';
    
        // echo '<b> pizza: </b>';
        // echo $categorie["naam"];
        // echo '&nbsp;';
        // echo '<b> formaat:</b>';
        // echo $product["formaat_ID"];
        // echo '&nbsp;&nbsp;';
        // echo  '<b>  prijs</b>: €' .$product["prijs"];
        // echo '&nbsp;&nbsp;';
        // echo '<b> Aantal:</b>';
        // echo $value;
        // echo '<button style="width: 30px;" name="add" value="'.$product['ID'].'">+</button>';
        // echo '<button style="width: 30px; name="del" value="'.$product['ID'].'">-</button> ';
        // echo '<b>subtotaal : € </b> '. $subtotaal;
        // // echo '</div> ';
       
       
        // echo '<br>';
        // echo '</form>';
        
    
    

    // $weborder_id = $verbinding->lastInsertId();
    $aantal = $value;
    $product_id = $categorie['ID'];
    $prijs_eenheid = $product['prijs'];
    



    $sql = "INSERT INTO item (ID, weborder_ID, klant_ID, product_ID, prijs_eenheid, aantal) values (?,?,?,?,?,?)";
    $stmt = $verbinding->prepare($sql);
    $data = array(NULL, $weborder_id, $_SESSION["USER_ID"], $product_id, $prijs_eenheid, $aantal);

    try{
        $stmt->execute($data);
        // echo "<script> alert('item opgeslagen');</script>";
        // echo "<script> location.href='facturering.php';</script>";
    }catch(PDOException $e){
        echo $e->getMessage();
        echo "<script> alert('kon geen item opslaan ');</script>";
    }

// hier haal ik de gegevens op voor de factuur (email en klant naam)
    $email = $_SESSION['E-MAIL'];
    // $email = "julian@elderson.eu";
    $klant = $_SESSION['USER_NAAM'];
    // $klant = "testklant";
    $onderwerp = "Uw bestelling bij Pizza's by Julian";
    // hier gooi ik het product wat in de bestelling zit in een subbericht 
    $subbericht = "<h3>de pizza:  ". $categorie['naam'] . "<br> de prijs van de pizza: €" . $product['prijs'] ."<br> formaat: ".$product["formaat_ID"] ."<br>aantal: " . $value . "<br>het subtotaal bedroeg: €" . number_format($subtotaal, 2, ',','.') ."<br><br>";
    // hier plak ik het subbericht aan het eindbericht
    $eindbericht = $eindbericht . $subbericht;
    // $bericht = "geachte klant uw bestelling is aangemaakt";
    // echo $eindbericht;
    echo "<br>";

    echo "<script> location.href='index.php?page=webshop';</script>";

//"<img width='100px' src='img/". $categorie['afbeelding']. "'/>" .





    unset( $_SESSION['winkelwagen'] );
}

// echo 'eindbericht: '. $eindbericht;
// hier voeg ik nog het totaal toe  van de bestelling die ik niet telkens wil herhalen in de loop
$eindbericht = $eindbericht . '<hr />het totaal bedroeg: €'.number_format($totaal, 2, ',','.');

// $totaalfactuur = "totaal van de bestelling is: ". $totaal;
// $eindbericht = $eindbericht . $totaalfactuur;
mailen($email, $klant, $onderwerp, $eindbericht);
}