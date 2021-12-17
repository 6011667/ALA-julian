

<?php
// var_dump(!isset($_SESSION["ID"]));
if(!isset($_SESSION["ID"])|| (!isset($_SESSION["STATUS"]) &&$_SESSION["STATUS"]!="ACTIEF")){
    echo "<script>
    alert('U heeft geen toegang tot deze pagina.');
    location.href='index.php';
    </script>";
}


include("product_add.html");
if(isset($_POST["submit"])){
    $melding = "";
    $naam = htmlspecialchars($_POST['naam']);
    $omschrijving = htmlspecialchars($_POST['omschrijving']);
    
    // database product
    $medium = htmlspecialchars($_POST['medium']);
    $large = htmlspecialchars($_POST['large']);
    $small = htmlspecialchars($_POST['small']);

    $prijsmedium = htmlspecialchars($_POST['prijsmedium']);
    $prijslarge = htmlspecialchars($_POST['prijslarge']);
    $prijssmall = htmlspecialchars($_POST['prijssmall']);

    $sql = "INSERT INTO categorie (ID, naam, omschrijving) values (?,?,?)";   // , soort, prijs, voorraad         // ,?,?,?
    $stmt = $verbinding->prepare($sql);
    try {
        $stmt->execute(array(
            NULL,
            $naam,
            $omschrijving,
            // $soort,
            // $prijs,
            // $voorraad
            
        )
        );
        $melding = "Nieuw product toegevoegd";
    }
    catch(PDOException $e){
        $melding="kon geen nieuw product aanmaken." .$e->getMessage();
    }
    
    $cat_id = $verbinding->lastInsertId();
    echo "<div id='melding'>" . $melding."</div>";




    //$query = "INSERT INTO product (formaat_ID, formaat_ID, formaat_ID, prijs, prijs, prijs) values (?,?,?,?,?,?)";
    $query = "INSERT INTO product (categorie_ID, formaat_ID, prijs) values (?,?,?)";
    $stmt = $verbinding->prepare($query);
    try {
        $stmt->execute(array(
            $cat_id,
            $medium,
            $prijsmedium
        )
        );
        $melding = "nieuw product toegevoegd";
    }
    catch(PDOException $e){
        $melding="kon geen nieuw product aanmaken." .$e->getMessage();
    }

      //$query = "INSERT INTO product (formaat_ID, formaat_ID, formaat_ID, prijs, prijs, prijs) values (?,?,?,?,?,?)";
      $query = "INSERT INTO product (categorie_ID, formaat_ID, prijs) values (?,?,?)";
      $stmt = $verbinding->prepare($query);
      try {
          $stmt->execute(array(
            $cat_id,
            $large,
            $prijslarge
          )
          );
          $melding = "noieuw product toegevoegd";
      }
      catch(PDOException $e){
          $melding="kon geen nieuw product aanmaken." .$e->getMessage();
      }

        //$query = "INSERT INTO product (formaat_ID, formaat_ID, formaat_ID, prijs, prijs, prijs) values (?,?,?,?,?,?)";
    $query = "INSERT INTO product (categorie_ID, formaat_ID, prijs) values (?,?,?)";
    $stmt = $verbinding->prepare($query);
    try {
        $stmt->execute(array(
            $cat_id,
            $small,
            $prijssmall
        )
        );
        $melding = "noieuw product toegevoegd";
    }
    catch(PDOException $e){
        $melding="kon geen nieuw product aanmaken." .$e->getMessage();
    }



    echo "<div id='melding'>" . $melding."</div>";

}
?>