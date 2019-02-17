<?php
$nom = "admin";
$pass = "admin";

if((!isset($_POST['nom']) || $_POST['nom'] != $nom) && (!isset($_POST['password']) || $_POST['password'] != $pass)){ ?>
    <form action="index.php" method="post">
        <input type="text" name="nom" placeholder="Nom" />
        <input type="password" name="password" placeholder="Mot de passe" />
        <input type="submit" value="Envoyer">
    </form>
<?php
} else {
    ?>
    <h2>Connexion réussie!</h2>

<?php
}