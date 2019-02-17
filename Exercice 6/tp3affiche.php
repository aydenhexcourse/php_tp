<?php

if (isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['annee'])) {
    $jour = $_POST['jour'];
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];
    echo "La date choisie est le $jour/$mois/$annee<br>";
}

if (isset($_POST['loisir'])){
    $loisir = $_POST['loisir'];
    echo "Le loisir choisi est $loisir";
}