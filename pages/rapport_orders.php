<div class="hero">

<?php


$sql = "SELECT * FROM gebruiker_permissies WHERE gebruiker_ID = ?  AND permissie_ID = 'admintoegang' "; //           
        $stmt = $verbinding->prepare($sql);
        $stmt->execute(array($_SESSION["USER_ID"]));   // array($email))
        $resultaat = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // print_r($_SESSION);
    //     echo $_SESSION["ID"];
// echo $resultaat;
if(!$resultaat){
    // echo 'verboden';
    header('Location: index.php?page=webshop');
}
else{
    // echo 'toegestaan';
}








$oquery = "SELECT * FROM weborder";
$stmt = $verbinding->prepare($oquery);
$stmt->execute();

$rows = $stmt->rowCount();
echo "<div class='card'>";
echo "<h1>";
echo  " aantal orders : ". $rows;
echo "</h1>";
echo '</div>';



$querys = "SELECT SUM(aantal) as aantal FROM item "; //COUNT aantal    WHERE product_ID = 1
$stmt = $verbinding->prepare($querys);
$stmt->execute(); //array($itemnaam['product_ID'])   array($idtt)
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($items as $item)
{    
    echo '<div class="card">';             // echo 'aantal verkocht: ' . $items['aantal'] ;
echo '<h1> totaal aantal verkochte pizzas :  ' . $item['aantal'] . '</h1>';

echo '</div>';

$queren = "SELECT SUM(prijs_eenheid) as prijs_eenheid FROM item";
$stmt = $verbinding->prepare($queren);
$stmt->execute();
$prijzen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($prijzen as $prijs)
{                // echo 'aantal verkocht: ' . $items['aantal'] ;
// echo '<h1> totale omzet :  ' . $prijs['prijs_eenheid'] . '</h1>';


// $probeersel = $item['aantal'] * $prijs['prijs_eenheid'];
// echo $probeersel;
}

$qry = "SELECT SUM(aantal * prijs_eenheid) as aantal , SUM(prijs_eenheid * aantal) as omzet FROM item" ;
$stmt = $verbinding->prepare($qry);
$stmt->execute();
$prijsaantal = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<div class="card">';
echo '<h1>totale ozmet : <br> &euro; '. number_format($prijsaantal['omzet'], 2, ',', '.');
echo '</h1></div>';

//oud
// $qry = "SELECT * FROM item";
// $stmt = $verbinding->prepare($qry);
// $stmt->execute();
// $prijsaantal = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $totaal = 0;

// foreach($prijsaantal as $werk){

//     $som = $werk['aantal'] * $werk['prijs_eenheid'];
//     // echo  '<br>';
//     // echo "dit is de prijs x aantal" . $som . "<br>";

//     $totaal += $som;
// }


// $omzet = $totaal * $item['aantal'];
// echo '<div class="card">'; 
// echo '<h1> totale omzet : <br>  &euro; '. $omzet . '</h1>';
// echo '</div>';

}
?>
<div class="card"> 
<form action="index.php?page=rapport_orders" method="post">
    <h1>noem een aantal pizza voor aantal orders</h1>
    <input style="width: 250px;" type="text" name="aantalpizza" placeholder="noem aantal pizza's voor aantal orders">
    <input type="submit" name="go" id="go" value="go">
</form>



<?php
if(isset($_POST['go'])){

    $aantalpizza = $_POST['aantalpizza'];
    
$sqlquery = "SELECT COUNT(aantal) as aantal FROM item WHERE aantal = ?";
$stmt = $verbinding->prepare($sqlquery);
$stmt->execute(array($aantalpizza));
$aantalorderpizza = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ( $aantalorderpizza as $een){

    echo "aantal bestellingen met ". $aantalpizza ." pizza's : ". $een['aantal'];
}
echo '</div>';
}
?>
<!-- <form action="index.php?page=rapport_orders" method="post">
<br><br><select name="testwerk" id=""> -->
<?php
//  $sqllaatste = "SELECT * FROM categorie";
//  $stmt = $verbinding->prepare($sqllaatste);
//             $stmt->execute();
//             $laatste = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             foreach ( $laatste as $laat){
// //  }
               
?>

        <!-- <option name="idpizza"  value=""><?php echo  $laat['ID'] ?></option>
     -->
     </div>
<?php
//$laat['naam'] . " ------ " .
// }
?>
<!-- </select>
 <input type="submit" name="gaan" id="gaan" value="go">
</form> -->
<?php

           
// if (isset($_POST['gaan']) && isset($_POST['testwerk'])){
    
// $getal = $_POST['idpizza'];

// echo $getal;
//             $querys = "SELECT SUM(aantal) as aantal FROM item WHERE product_ID = ?"; //COUNT aantal    WHERE product_ID = 1
//             $stmt = $verbinding->prepare($querys);
//             $stmt->execute(array($getal)); //array($itemnaam['product_ID'])   array($idtt)
//             $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($items as $item)
// {                // echo 'aantal verkocht: ' . $items['aantal'] ;
//             echo '<h1> aantal verkochte pizzas per type: ' .$item['aantal'];
            
           
//         }

    
// }


       
            // echo "<input type='hidden' name='lus' id='lus' value='" .$lus. "'/>";
            ?>
        
        </div>
       






        <div class="content">
    <table id='table' border="0" cellspacing="3">
        <caption>
            <h3>aantal verkochte pizza's per type</h3>
        </caption>
        <thead>
            <tr>
                <th>product id</th>
                <th>aantal pizza's verkocht</th>
                <!-- <th>pizza naam</th> -->
                <!-- <th>soort</th>
                <th>Prijs</th> -->
        </thead>
        <tbody>
            <?php
$arr = array('1','2','3');


$sql = "SELECT naam FROM categorie where ID = 1";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
                $sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 1";
                $stmt = $verbinding->prepare($sql);
                $stmt->execute();
                $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $bgcolor = true;
            foreach($producten as $product){
                $id = $product['ID'];
                echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
                echo
                "<td>".$product['product_ID']. "</td>".
                "<td>".$product['aantal']. "</td>".
                 "<td>". $naam['naam'] . "</td>";
                // "<td>".$product['soort']. "</td>".
                // "<td>".$product['prijs']. "</td>".
               
                $bgcolor= ($bgcolor ? false:true);
            }
        }

        $sql = "SELECT naam FROM categorie where ID = 2";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
            $sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 2";
            $stmt = $verbinding->prepare($sql);
            $stmt->execute();
            $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $bgcolor = true;
        foreach($producten as $product){
            $id = $product['ID'];
            echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
            echo
            "<td>".$product['product_ID']. "</td>".
            "<td>".$product['aantal']. "</td>".
            "<td>". $naam['naam'] . "</td>";
            // "<td>".$product['soort']. "</td>".
            // "<td>".$product['prijs']. "</td>".
           
            $bgcolor= ($bgcolor ? false:true);
        }
    }

    $sql = "SELECT naam FROM categorie where ID = 3";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
        $sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 3";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute();
        $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $bgcolor = true;
    foreach($producten as $product){
        $id = $product['ID'];
        echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
        echo
        "<td>".$product['product_ID']. "</td>".
        "<td>".$product['aantal']. "</td>".
        "<td>". $naam['naam'] . "</td>";
        // "<td>".$product['soort']. "</td>".
        // "<td>".$product['prijs']. "</td>".
       
        $bgcolor= ($bgcolor ? false:true);
    }
}
$sql = "SELECT naam FROM categorie where ID = 4";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
    $sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 4";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute();
    $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $bgcolor = true;
foreach($producten as $product){
    $id = $product['ID'];
    echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
    echo
    "<td>".$product['product_ID']. "</td>".
    "<td>".$product['aantal']. "</td>".
    "<td>". $naam['naam'] . "</td>";
    // "<td>".$product['soort']. "</td>".
    // "<td>".$product['prijs']. "</td>".
   
    $bgcolor= ($bgcolor ? false:true);
}
}

$sql = "SELECT naam FROM categorie where ID = 5";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
$sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 5";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
$bgcolor = true;
foreach($producten as $product){
$id = $product['ID'];
echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
echo
"<td>".$product['product_ID']. "</td>".
"<td>".$product['aantal']. "</td>".
"<td>". $naam['naam'] . "</td>";
// "<td>".$product['soort']. "</td>".
// "<td>".$product['prijs']. "</td>".

$bgcolor= ($bgcolor ? false:true);
}
}

$sql = "SELECT naam FROM categorie where ID = 6";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
$sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 6";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
$bgcolor = true;
foreach($producten as $product){
$id = $product['ID'];
echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
echo
"<td>".$product['product_ID']. "</td>".
"<td>".$product['aantal']. "</td>".
"<td>". $naam['naam'] . "</td>";
// "<td>".$product['soort']. "</td>".
// "<td>".$product['prijs']. "</td>".

$bgcolor= ($bgcolor ? false:true);
}
}

$sql = "SELECT naam FROM categorie where ID = 7";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
$sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 7";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
$bgcolor = true;
foreach($producten as $product){
$id = $product['ID'];
echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
echo
"<td>".$product['product_ID']. "</td>".
"<td>".$product['aantal']. "</td>".
"<td>". $naam['naam'] . "</td>";
// "<td>".$product['soort']. "</td>".
// "<td>".$product['prijs']. "</td>".

$bgcolor= ($bgcolor ? false:true);
}
}

$sql = "SELECT naam FROM categorie where ID = 8";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$namen = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($namen as $naam){
$sql = "SELECT ID, product_ID , SUM(aantal) as aantal FROM item where product_ID = 8";
$stmt = $verbinding->prepare($sql);
$stmt->execute();
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
$bgcolor = true;
foreach($producten as $product){
$id = $product['ID'];
echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
echo
"<td>".$product['product_ID']. "</td>".
"<td>".$product['aantal']. "</td>".
"<td>". $naam['naam'] . "</td>";
// "<td>".$product['soort']. "</td>".
// "<td>".$product['prijs']. "</td>".

$bgcolor= ($bgcolor ? false:true);
}
}

            ?>
        </tbody>
        <tfoot>
            <tr>
               
            </tr>
            <tr>
        
            </tr>
        </tfoot>
    </table>
</div>