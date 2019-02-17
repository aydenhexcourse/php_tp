<?php
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == true) {


include("pdo.php");
$statut=$connexion->prepare("SELECT * FROM Statut");
$statut->execute();
$statut->setFetchMode(PDO::FETCH_OBJ);

$acces = $connexion->prepare("SELECT prenom, login, password, age, statut FROM Acces WHERE id=:id");
$acces->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
$acces->execute();
$ligne = $acces->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>Modifier </title>
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
            <input type="text" placeholder="Jean" name="surname" id="surname" value="<?php echo $ligne->prenom; ?>" required/>
        </div>
        <div class="block">
            <label for="login">Login : </label>
            <input type="text" placeholder="Login" name="login" value="<?php echo $ligne->login; ?>" required/>
        </div>
        <div class="block">
            <label for="password">Mot de passe : </label>
            <input type="password" placeholder="Prénom" name="password" id="password" value="<?php echo $ligne->password ?>" required/>
        </div>
        <div class="block">
            <label for="age">Age </label>
            <input type="number" name="age" id="age" value="<?php echo $ligne->age ?>" required/>
        </div>
        <div class="block">
            <label for="status">Statut</label>
            <select name="statut" value="<?php echo $ligne->statut ?>" required>
                <?php
                foreach ($statut as $item) {
                    echo "<option value='$item->id'>$item->nom</option>";
                }
                ?>
            </select>
        </div><br>
        <input type="submit" value="Modifier" />
    </form>
    <a href="liste.php">Retourner à la liste</a>

    <?php
    if(isset($_POST['surname']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['statut']) && isset($_POST['age'])) {
        try {
            $add = $connexion->prepare("UPDATE Acces SET prenom=:prenom, login=:login, password=:password, statut=:statut, age=:age WHERE id=:id");
            $add->bindValue(":prenom", $_POST['surname'], PDO::PARAM_STR);
            $add->bindValue(":login", $_POST['login'], PDO::PARAM_STR);
            $add->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
            $add->bindValue(":statut", $_POST['statut'], PDO::PARAM_INT);
            $add->bindValue(":age", $_POST['age'], PDO::PARAM_INT);
            $add->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
            $add->execute();
            $_GET['msg'] = "Update réussie !";
        } catch (Exception $e) {
            $_GET['msg'] = $e;
        }

    }
    ?>
</div>
</body>
</html>


<?php } else { header("Location:login.php"); }
