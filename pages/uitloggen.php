<?php
if(!isset($_SESSION["ID"])&&$_SESSION["STATUS"]!="ACTIEF"){           // hier check ik of
    echo "<script>alert('U heeft geen toegang tot deze pagina.');
    location.href='../index.php';
    </script>";
}
unset($_SESSION["ID"]);                           // hier eindig ik de sessie voor de gebruiker die ingelogd is zodat hij weer opnieuw kan in loggen eventueel met een ander account
unset($_SESSION["USER_ID"]);                      // zodat hij weer opnieuw kan in loggen eventueel met een ander account
unset($_SESSION["USER_NAAM"]);
unset($_SESSION["STATUS"]);
unset($_SESSION["E_MAIL"]);
unset($_SESSION["ROL"]);
// Session beëindigen
session_destroy();
// Database verbinding sluiten
$verbinding = null;
echo "<script>location.href='".$_SERVER["PHP_SELF"].
"'</script>";