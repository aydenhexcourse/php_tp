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
                <label for="agemin">Age minimum</label>
                <input type="number" name="agemin" id="agemin" required/>
            </div>
            <div class="block">
                <label for="agemax">Age maximum</label>
                <input type="number" name="agemin" id="agemax" required/>
            </div>
            <div class="block">
                    <?php
                    foreach ($statut as $item) {
                        echo "<input type='radio' name='statut' id='$item->id' value='$item->id'/><label for='$item->id'>$item->nom</label>";
                    }
                    ?>
            </div><br>
            <input type="submit" value="Rechercher" />
        </form>
        <?php
        if(isset($_POST['surname']) && isset($_POST['agemin']) && isset($_POST['agemax']) && isset($_POST['statut'])){
            $result = $connexion->prepare("SELECT id, prenom, statut, age FROM Acces WHERE prenom is like :prenom AND age BETWEEN :agemin AND :agemax AND statut = :statut");
            $result->bindValue(":prenom", $_POST['prenom'].'%', PDO::PARAM_STR);
            $result->bindValue(":agemin", $_POST['agemin'], PDO::PARAM_INT);
            $result->bindValue(":agemax", $_POST['agemax'], PDO::PARAM_INT);
            $result->bindValue(":statut", $_POST['statut'], PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_OBJ);
            echo $result->rowCount();
        }
        ?>
        <a href="liste.php">Retourner à la liste</a>
    </div>
    </body>
    </html>
<?php } else { header("Location:login.php"); } ?>


