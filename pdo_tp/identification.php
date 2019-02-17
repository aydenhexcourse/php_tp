<?php
session_start();

if(empty($_POST['username']) && empty($_POST['password'])){
    echo "absence d'identifiants";
} else {
    include('pdo.php');
    $result=$connexion->prepare("SELECT id, prenom FROM Acces WHERE login=:login AND password=:password");
    $result->bindValue(":login", $_POST['username'], PDO::PARAM_STR);
    $result->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
    $result->execute();
    if($result->rowCount() >= 1) {
        echo "<h1>Connexion réussie, redirection en cours</h1>";
        $_SESSION['connexion'] = true;
        $_SESSION['prenom'] = $result->fetch()['prenom'];
        header("Refresh: 3; URL=liste.php");
    } else {
        echo "<h1>Connexion refusée, redirection en cours</h1>";
        header("Refresh: 3; URL=login.php");
    }
}
?>