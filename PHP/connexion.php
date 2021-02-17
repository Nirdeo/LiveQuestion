<?php

function connexionBdd() {
    require("config.php");

    try {

        $co = new PDO("mysql:host=" . $server .";dbname=" . $dbname, $user, $pass);
        $co->setAttribute(PDO:ATTR-ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
    return $co;
}

?>