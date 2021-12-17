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
    <form name="rapporten" id="rapporten" action="" method="POST" >
        <select style="font-size: 1.0rem" name="rapport">
    <option value="">Rapport selecteren</option>
    <option value="orders">Orders</option>
    <!-- <option value="voorraad">Voorraad</option> -->
</select>
<br>
<div class="icon_container">
    <input type="submit" class="icon" id="submit" name="submit" value="&rarr;">
</div><br>
    </form>
</div>
<?php
if(isset($_POST["submit"])){
    if($_POST["rapport"]== "orders") {
        include_once("rapport_orders.php");
    }
    
}
?>