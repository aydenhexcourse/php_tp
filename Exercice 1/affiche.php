<?php
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codepostal = $_POST['codepostal'];
    print("Bienvenue $prenom  $nom<br>");
    print("Nous avons bien noté que vous habitez <br>");
    print("$adresse à $ville($codepostal)");