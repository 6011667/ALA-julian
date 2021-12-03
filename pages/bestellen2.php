<?php

if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


if( isset($_POST['submit'])){

$id = null;
$klantid = $_SESSION["USER_ID"];
$datum = new DateTime();
$datum = date_format($datum, "c");
$sql = "INSERT INTO weborder (ID, klant_ID, datum) values (?,?,?)";
$stmt = $verbinding->prepare($sql);

$data = array(null, 11, $datum);
try {
    $stmt->execute($data);
    // echo "<script> alert('bestelling aangemaakt.');</script>";
    print_r($data);
}catch(PDOException $e){
    echo $e->getMessage();
    echo "<script> alert('kon geen bestelling aanmaken');</script>";
        echo "<script> location.href='index.php?page=webshop';</script>";
}



}