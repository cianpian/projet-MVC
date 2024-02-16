<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.critiquer.inc.php";
include_once "$racine/modele/authentification.inc.php";

if(isLoggedOn()){
    delCritique($_SESSION['mailU'],$_GET['idR']);
}






header('Location: ' . $_SERVER['HTTP_REFERER']);
?>