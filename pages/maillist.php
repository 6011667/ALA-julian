<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
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
    
    "<td>".$klant['email']. "</td>".
    "<td>" ."<a href='mailto:". $klant['email']."'>mailen!</a>" . "</td>".          
   "</tr>";
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