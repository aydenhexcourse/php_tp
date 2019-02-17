<?php
/**
 * Created by PhpStorm.
 * User: royer
 * Date: 10/02/2019
 * Time: 13:09
 */

$ligne = $_POST['nombreligne'];
$border = $_POST['taillebordure'];
$colonne = $_POST['nombrecols'];

echo "<table border='$border'>";
for($i=0 ; $i<$ligne ; $i++){
    echo "<tr>";
    for($t=0 ; $t<$colonne ; $t++) {
        echo "<td>$colonne</td>";
    }
    echo "</tr>";
}