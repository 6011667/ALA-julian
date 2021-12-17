<?php

function controle($permissie) {
    include 'db.php';

    $sql = "SELECT * FROM gebruiker_permissies WHERE gebruiker_ID = ? AND permissie = ?";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array($_SESSION["USER_ID"], $permissie));
    $macht = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$macht) {
        header("Location: index.php?page=webshop");
        exit();

    }
}
