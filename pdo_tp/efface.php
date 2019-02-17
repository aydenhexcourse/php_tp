<?php
    session_start();
    if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == true) {
        if (isset($_GET['id'])) {
            try {
                include("../pdo.php");
                $result = $connexion->prepare("DELETE FROM Acces WHERE id= :id");
                $result->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
                $result->execute();
                $msg = "Suppression réussie";
            } catch (Exception $e) {
                $msg = "Supression échouée";
            }
        } else {
            $msg = "Supression échouée";
        }
        header("Location:../views/liste.php?msg=$msg");
    } else {
        header("Location:login.php");
    }
?>