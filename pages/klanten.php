<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}

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

?>
<div class="content">
    <table id='table' border="0" cellspacing="3">
        <caption>
            <h3>Edit gebruiker gegevens</h3>
        </caption>
        <thead>
            <tr>
                <th>voornaam</th>
                <th>achternaam</th>
                <th>straat</th>
                <th>postcode</th>
                <th>woonplaats</th>
                <th>email</th>
        </thead>
        <tbody>
            <?php
    $sql = "SELECT * FROM klant";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array());
    $klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $bgcolor = true;
foreach($klanten as $klant){
    $id = $klant['ID'];
    echo ($bgcolor ? "<tr bgcolor=#ccc>" : "<tr>");
    echo
    "<td>".$klant['voornaam']. "</td>".
    "<td>".$klant['achternaam']. "</td>".
    "<td>".$klant['straat']. "</td>".
    "<td>".$klant['postcode']. "</td>".
    "<td>".$klant['woonplaats']. "</td>".
    "<td>".$klant['email']. "</td>".
    "<td><a style='text-decoration: none' href='index.php?page=klant_edit&id=". $klant['ID']. "'>&#9989;</a></td>".
    "<td><a style='text-decoration: none' href='index.php?page=klant_delete$id=". $klant['ID']. "'>&#10062;</a></td></tr>";
    $bgcolor= ($bgcolor ? false:true);
}
?>
        </tbody>
        <tfoot>
            <tr>
                <!-- <th colspan="6"> <a class="add" href="index.php?page=klant_add">&#10012;</a></th> -->
        
</tr>
<tr>
    <td colspan="6"><a href="index.php?page=webshop">Terug</a></td>
</tr>
    </tfoot>
    </table>
</div>