<?php $mois = array(1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Aout",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre"
    );

    $loisir_fav = ['Sport', 'Musique', 'Jeux', 'Voyage'];
    $loisir_pra = ['Tennis', 'Jeux-vidéos', 'Randonné', 'Cyclisme'];
?>

<form action="tp3affiche.php" method="post">
    <label for="jour">Jour</label>
    <select id="jour" name="jour">
        <?php for($i=1 ; $i < 32 ; $i++) { echo "<option value='$i'>$i</option>"; } ?>
    </select><br>

    <label for="annee">Année</label>
    <select id="annee" name="annee">
        <?php for($i=1980 ; $i < 2006 ; $i++) { echo "<option value='$i'>$i</option>"; } ?>
    </select><br>

    <label for="mois">Mois</label>
    <select id="mois" name="mois">
        <?php for($i=1 ; $i < 13 ; $i++) { echo "<option value='$i'>$mois[$i]</option>"; } ?>
    </select><br>

    <div>
        <p>Loisir favoris</p>
        <?php foreach ($loisir_fav as $item) { echo "<input type=radio name='loisir' id='$item' value='$item'><label for='$$item'>$item</label>"; } ?>
    </div><br>

    <div>
        <p>Loisir Pratiqué</p>
        <?php foreach ($loisir_pra as $item) { echo "<input type='checkbox' name='loisir_pra[]' id='$item' value='$item'><label for='$$item'>$item</label>"; } ?>
    </div>

    <input type="submit" value="Envoyer"/>
</form>
