<?php
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codepostal = $_POST['codepostal'];
    print("<a href=\"etatcivil.php?nom=$nom&prenom=$prenom\">votre état civil</a><br>");
    print("<a href=\"adresse.php?adresse=$adresse&ville=$ville&codepostal=$codepostal\">votre adresse</a>");