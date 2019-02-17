<?php
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == true) {
include("pdo.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>Liste </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login and Registration Form with HTML5 and CSS3"/>
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css"/>
</head>
<body>
<a href="deconnexion.php"><img src="images/deconnexion.png"/></a><br>
<a href="recherche.php">Rechercher</a>
<p>Bienvenue <?php echo $_SESSION["prenom"]; ?></p>
<div>
    <?php if (isset($_GET['msg'])) { $msg = $_GET['msg']; echo "<p style='text-align: center;'>$msg</p>"; } ?>
    <table border="1" class="liste center">
        <tr>
            <thead>
            <th>Nom</th>
            <th>Login</th>
            <th>Status</th>
            <th>Age</th>
            <th style="text-align: center;"><a href="ajoute.php"><img src="images/ajoute.png"/></a></th>
            </thead>
        </tr>
        <?php
        $result = $connexion->prepare("SELECT id, prenom, login, statut, age FROM Acces");
        $result->execute();
        $result->setFetchMode(PDO::FETCH_OBJ);
        while ($ligne = $result->fetch()) // on récupère la liste des membres
        {
            echo "<tr>
                        <td>$ligne->prenom</td>
                        <td>$ligne->login</td>
                        <td>$ligne->statut</td>
                        <td>$ligne->age</td>
                        <td style='text-align: center;'><a href='efface.php?id=$ligne->id'><img src='images/croix.png'/></a></td>
                        <td style='text-align: center'><a href='modif.php?id=$ligne->id'><img src='images/modif.png'/></a></td>
                    </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

<?php } else { header("Location:login.php"); }



