<?php
session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == true) {
include("pdo.php");
$statut=$connexion->prepare("SELECT * FROM Statut");
$statut->execute();
$statut->setFetchMode(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>Ajoute </title>
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
<p>Bienvenue <?php echo $_SESSION["prenom"]; ?></p>
<div>
    <?php if (isset($msg)) { echo $msg; } ?>
    <form method="post" class="ajoute">
        <div class="block">
            <label for="surname">Prenom : </label>
            <input type="text" placeholder="Jean" name="surname" id="surname" required/>
        </div>
        <div class="block">
            <label for="login">Login : </label>
            <input type="text" placeholder="Login" name="login" required/>
        </div>
        <div class="block">
            <label for="password">Mot de passe : </label>
            <input type="password" placeholder="Prénom" name="password" id="password" required/>
        </div>
        <div class="block">
            <label for="age">Age </label>
            <input type="number" name="age" id="age" required/>
        </div>
        <div class="block">
            <label for="status">Statut</label>
            <select name="statut" required>
                <?php
                    foreach ($statut as $item) {
                        echo "<option value='$item->id'>$item->nom</option>";
                    }
                ?>
            </select>
        </div><br>
        <input type="submit" value="Ajouter" />
    </form>
    <a href="liste.php">Retourner à la liste</a>
</div>


<?php
    if(isset($_POST['surname']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['statut']) && isset($_POST['age'])) {
        try {
            $add = $connexion->prepare("INSERT INTO Acces (prenom, login, password, statut, age) VALUES (:prenom, :login, :password, :statut, :age)");
            $add->bindValue(":prenom", $_POST['surname'], PDO::PARAM_STR);
            $add->bindValue(":login", $_POST['login'], PDO::PARAM_STR);
            $add->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
            $add->bindValue(":statut", $_POST['statut'], PDO::PARAM_INT);
            $add->bindValue(":age", $_POST['age'], PDO::PARAM_INT);
            $add->execute();
            $msg = "Accès ajouté !";
        } catch (Exception $e) {
            $msg = "Accès non ajouté ($e)";
        }

    }

?>
</body>
</html>
<?php } else { header("Location:login.php"); } ?>


