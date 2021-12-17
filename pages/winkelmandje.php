<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}

?>

<?php

// print_r($_SESSION);
        // de sessie is al gestart dus hoef ik hem niet nog een keer te starten 
if( !isset( $_SESSION['winkelwagen'] ) ) {
    // we zetten een krat voor producten in de loods ($_SESSION)
    $_SESSION['winkelwagen'] = array();
}

// de post afvangen
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    // de speciefieke stukken
    if( isset( $_POST['add'] ) ) {
        $_SESSION['winkelwagen'][$_POST['add']] += 1;
    }

    elseif ( isset( $_POST['del'] ) ){

        if ( $_SESSION['winkelwagen'][$_POST['del']] === 1) {
            // producten met het aantal 0 tonen is raar
            unset($_SESSION['winkelwagen'][$_POST['del']]);


            
        }
        elseif ( $_SESSION['winkelwagen'][$_POST['del']] > 1 ) {
            // ik verkoop geen negatieve aantallen
            $_SESSION['winkelwagen'][$_POST['del']] -= 1;
        }
    }

    elseif ( isset($_POST['clear'] ) ) {
        unset( $_SESSION['winkelwagen'] );
    }


    // function berekentotaal() {
        
    // }

    // einde speciefieke stukken
     
    // weg na de post

    header("location: index.php?page=winkelmandje");
    exit();
}

?>
<div class='imw'>
<h3>
    in mijn winkelwagentje
</h3>
</div>
<div class="winkelmandbox">
<?php 

// print_r($_SESSION);



$totaal = 0;

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
    
    
   
    


     
    echo '<form method="post" class="kaart2">';  //class="winkelmandje"

 

    echo "<img width='382px' src='img/". $categorie['afbeelding']. "'/>" ;
    echo "<table id='tabletwee' border='0' cellspacing='20'>";
    echo "    
        <thead>
            <tr>
                <th>productnaam</th>
                <th>formaat</th>
                 <th>prijs</th>
                <th>aantal</th> 
                <th>subtotaal</th
            </tr>
        </thead>
        <tbody>";  //<caption><h3>Producten aanpassen</h3> </caption>
    // echo '<b> pizza: </b>';
    echo "<td>";
    echo $categorie["naam"];
    echo "</td>";
    echo '&nbsp;';
    // echo '<b> formaat:</b>';
    echo "<td>";
    echo $product["formaat_ID"];
    echo "</td>";
    echo '&nbsp;&nbsp;';
    echo "<td>";
    // echo  '<b>  prijs</b>: €'; 
    echo $product["prijs"];
    echo "</td>";
    echo '&nbsp;&nbsp;';
    // echo '<b> Aantal:</b>';
    echo "<td>";
    echo '<button style="width: 30px;" name="add" value="'.$product['ID'].'">+</button>';
    echo ' '.$value. ' ';
    echo '<button style="width: 30px;" name="del" value="'.$product['ID'].'">-</button> ';
    echo "</td>";
    // echo '<button style="width: 30px;" name="add" value="'.$product['ID'].'">+</button>';
    // echo '<button style="width: 30px;" name="del" value="'.$product['ID'].'">-</button> ';

    echo "<td>";
    echo '<b>subtotaal : € </b> '. $subtotaal;
    echo "</td>";
    // echo '</div> ';
   
   echo "</tbody>";
   echo "</table>";
    echo '<br>';
    echo '</form>';
    

    $totaal += $subtotaal;
}

echo '<h3>het totaal van de bestelling is: €'.  number_format($totaal, 2, ',','.') . '</h3>';

?>

</div>
<form method="post">
    <button class="bevestigenIcon3" name="clear">maak je mandje leeg</button>
</form>

<?php
// echo  'totaal is'.$totaal;
// echo   'totaal :' . $totaal +$subtotaal ;

?>
<div>
<form action="index.php?page=bestellen" method='POST' name='bestellen' id='bestellen'>

 <!-- // dit is de bestelknop
 <div class="icon_container">
                <input type="submit" class="winkelKnop" id="submit" name="submit" value="bestellen" /> 
                &rarr; 
            </div> -->

</form>



<?php
$sql = "SELECT * FROM klant WHERE email = ?";
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($_SESSION["E-MAIL"]));
$resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($resultaten as $resultaat){
    ?>
<div class="content">
        <form  action="index.php?page=bestellen" method='POST' name='bestellen' id='bestellen' class="inlogFormulier">
            <p id="pagina_titel">kijk hier eerst nog een keertje of je gegevens kloppen.</p>
        
            <label >voornaam:</label>
    <input class="inputVeld" type="text" name="voornaam" id="voornaam" value="<?php  echo $resultaat['voornaam'];?>" />
    <label >achternaam:</label>
    <input class="inputVeld" type="text" name="achternaam" id="achternaam" value="<?php echo $resultaat['achternaam'];?>">
    <label >straat:</label>
    <input class="inputVeld" type="text" name="straat" id="straat" value="<?php echo $resultaat['straat'];?>">
    <label >postcode:</label>
    <input class="inputVeld" type="text" name="postcode" id="postcode" value="<?php echo $resultaat['postcode'];?>">
    <label >woonplaats:</label>
    <input class="inputVeld" type="text" name="woonplaats" id="woonplaats" value="<?php echo $resultaat['woonplaats'];?>">
    <label >email:</label>
    <input class="inputVeld" type="email" name="e-mail" id="e-mail" value="<?php echo $resultaat['email'];?>">

          
        
</br>
 <!-- // dit is de bestelknop -->
 <div class="icon_container">
                <input class="bevestigenIcon2" type="submit"  id="bestellen" name="bestellen" value="bestellen" /> 
                <!-- &rarr; -->
            </div>
        </form>
    </div>
    <?php
}
?>