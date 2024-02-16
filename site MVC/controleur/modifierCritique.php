<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.critiquer.inc.php";

$idR = $_GET["idR"];
$note = $_POST["note"];
$commentaire = $_POST["commentaire"];
$mailU = getMailULoggedOn();


if ($mailU != "") {
    $critiquer = getCritiquerByUtil($idR, $mailU);
    
    if ($critiquer == false) {
        addCritique($idR, $mailU, $note, $commentaire);
    } else {
        delCritique($mailU, $idR);
        addCritique($idR, $mailU, $note, $commentaire);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>