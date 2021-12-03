<?php

// $sql = "SELECT * FROM klant WHERE email = ?";             
// $stmt = $verbinding->prepare($sql);
// $stmt->execute(array($email));
// $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

//     $rol = $resultaat["rol"];

//     $_SESSION["ROL"] = $rol;






// $query = "SELECT * FROM permissie";
// $stmt = $verbinding->prepare($sql);
// $stmt->execute(array($email));
// $handig = $stmt->fetch(PDO::FETCH_ASSOC);


// $permissie = $handig["toegang"];












//     if($rol == 0){                                                     // hier kijk ik of de gebruiker een gast of een admin is of dat de gebruiker geblokkeerd is
//         // header('Location: index.php?page=webshop');

//         $permissie = 0;

//     }
//     elseif ($rol == 1){
//         // header('Location: index.php?page=producten');
//         $permissie = 1;
//     }
?>

<?php

$sql = "SELECT * FROM klant WHERE email = ?";             
$stmt = $verbinding->prepare($sql);
$stmt->execute(array($email));
$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);

    $rol = $resultaat["rol"];

    $_SESSION["ROL"] = $rol;


    if($rol == 0){
        header('Location: index.php?page=inloggen');
        echo "u heeft geen permissie";
    }

  elseif($rol == 1){
      header(' location: index.php?page=producten');
  }

  ?>