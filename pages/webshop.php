
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
if (isset($_POST['addc'])){
    // print_r($_SESSION);
    //  echo 'HIERZO';     
      
    if (!isset( $_SESSION['winkelwagen'][$_POST['select']])){
            echo "<p>hallo</p>";    
            // print_r($_SESSION);
            if(is_numeric($_POST['aantal']) && $_POST['aantal'] >= 1){
           print_r( $_SESSION['winkelwagen'][$_POST['select']] += $_POST['aantal']);
            }
        }


        // foreach ($_POST["aantal"] as $key => $value) {
            
        //     if ($value == 0) {
        //         unset($_SESSION["winkelwagen"][$key]);
        //     }
        //      else {
        //         $_SESSION["winkelwagen"][$key]["aantal"] = $value;
        //     }
        // }


    header("location: index.php?page=webshop");
     exit();
  }

            
        
?>


<!-- dit is het zoekformulier -->
<!-- src="js/webshop.js" -->
<script src="js/webshop.js"></script>
<div class="content">
            <form action="" name="search" id="search" method="POST">
                <input class="inputVeld" type="text"  id="patroon" name="patroon" placeholder="zoek je favoriete pizza's"/>
                <input class="bevestigenIcon" type="submit"  id="zoeken" name="zoeken" value="&#128270;"/><br>
            </form>

        <?php

        //hier wordt de sql-opdracht gegenereerd

        if(isset($_POST["zoeken"]) && !empty($_POST["patroon"])){
            $patroon = htmlspecialchars($_POST["patroon"]);
            $sql = "SELECT * FROM categorie WHERE naam LIKE '%$patroon%' ||
            omschrijving LIKE '%$patroon%'";
        }else {
            $sql = "SELECT * FROM categorie";
        }
        ?>
        <!-- weergave van de producten (alles of op basis van zoekopdracht) -->
        <div class="hero">
                <!-- <form action="index.php?page=bestellen" id="webshop" method="POST" name="webshop">
                </form> -->
                <script>
           var a=document.getElementById("leverbaar").value;
           if (a == 1){
               document.getElementById("voeToeButton").style.display="none";
           }
       </script>

            <?php
            
            $stmt = $verbinding->prepare($sql);
            $stmt->execute();
            $categorien = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // $lus = 0;
            foreach($categorien as $categorie){

                if ( $categorie['leverbaar'] == 1){
                    $categorie['omschrijving'] = "dit product is helaas niet meer leverbaar";
                    // echo "<div class='kaart' style='dispay: none;'>";
                    echo '<script>  document.getElementById("voeToeButton").style.display="none"; </script>';
                }


                //begin van de versie van het boek
                echo '<div class="kaart" id="kaart">'; 
                echo "<img width='100px' src='img/". $categorie['afbeelding']. "'/>";
                // echo "<input type='hidden' name='id[$lus]' id='id[$lus]' value='". $product['ID'] . "' />";
                // echo "<input type='hidden'  value='" . $categorie['naam'] . "' />";
                // echo "<input type='hidden' value='" . $categorie['omschrijving'] . "' />";
                // echo "<input type='hidden' name='soort[$lus]' id='soort[$lus]' value='" . $product['afbeelding']. "' />";
                echo "<br><div  name='naam' class='productNaam'> " . $categorie["naam"] . "</div>" . "<br><div class='productOmschrijving'> " . $categorie["omschrijving"] . "</div>";
                $leverbaar = $categorie['leverbaar'];
                echo "<input type='hidden' id='leverbaar' value='$leverbaar' placeholder='$leverbaar' />";
                // echo "<input type='hidden' name='id' id='id' value='". $categorie['ID'] . "' />" ;
                $query = "SELECT * FROM product WHERE categorie_ID = ? ";
                $stmt = $verbinding->prepare($query);
                $stmt->execute(array($categorie['ID']));
                $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<form method='POST'>";

                echo "<input type='hidden' name='id' id='id' value='". $categorie['ID'] . "' />" ;

                echo "<select name='select'>";   
                
                foreach ($producten as $product){
                $id = $product['ID'];

                echo "<option  name='keuze' value='$id'> ". $product['prijs']. "----" . $product['formaat_ID'] ."</option>";
               
                }
                echo "</select>";

                // echo "<br> " . " Prijs: €  " . $product["prijs"] ;
                echo "<input class='aantal' type='number' style='width: 10%;' name='aantal' min='1' value='0' />";
                echo "<input class='voegToeButton' id='voegToeButton'  type='submit' name='addc' value='voeg toe' />";

                echo "</form>";

                //echo "<hr />"; // Dit is het lijntje
                echo "</div>";
               
            }
            // echo "<input type='hidden' name='lus' id='lus' value='" .$lus. "'/>";
            ?>
        
        </div>
       
        <p>pagina 1 - 1</p>
<!-- <form action="index.php?page=bestellen" method='POST' name='bestellen' id='bestellen'>

  // dit is de bestelknop 
 <div class="icon_container">
                <input type="submit" class="winkelKnop" id="submit" name="submit" value="bestellen" /> 
                &rarr;
            </div> 

</form> -->


    </body>
</html>
