<?php
// include("pages/" . "permissie". ".php"); 
?>

<?php
// var_dump(!isset($_SESSION["ID"]));


// $sql = "SELECT * FROM klant ";             
//         $stmt = $verbinding->prepare($sql);
//         $stmt->execute();   // array($email))
//         $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);







// $rol = $resultaat["rol"];
// $_SESSION["ROL"] = $rol;

if( !isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF"  && $_SESSION["ROL"] == 0)  ){

    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}
// elseif ($_SESSION["ROL"] == 0){
//     echo "<script>
//     alert('U heeft geen toegang tot deze pagina.');
//     location.href='index.php';
//     </script>";
// }

?>
<div class="content">
    <table id='table' border="0" cellspacing="3">
        <caption>
            <h3>Producten aanpassen</h3>
        </caption>
        <thead>
            <tr>
                <th>productnaam</th>
                <th>beschrijving</th>
                <!-- <th>soort</th>
                <th>Prijs</th> -->
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM categorie";
                $stmt = $verbinding->prepare($sql);
                $stmt->execute(array());
                $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $bgcolor = true;
            foreach($producten as $product){
                $id = $product['ID'];
                echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
                echo
                "<td>".$product['naam']. "</td>".
                "<td>".$product['omschrijving']. "</td>".
                // "<td>".$product['soort']. "</td>".
                // "<td>".$product['prijs']. "</td>".
                "<td><a style='text-decoration: none' href='index.php?page=product_edit&id=". $product['ID']. "'>&#9989;</a></td>".
                "<td><a style='text-decoration: none' href='index.php?page=prijzen&id=". $product['ID']. "'>prijzen</a></td></tr>";
                $bgcolor= ($bgcolor ? false:true);
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6"> <a class="add" href="index.php?page=product_add">&#10012;</a></th>
            </tr>
            <tr>
                <td colspan="6"><a href="index.php?page=webshop">Terug</a></td>
            </tr>
        </tfoot>
    </table>
</div>