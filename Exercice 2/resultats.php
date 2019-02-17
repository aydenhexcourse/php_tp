<?php
/**
 * Created by PhpStorm.
 * User: royer
 * Date: 10/02/2019
 * Time: 13:09
 */

if($_POST["nombremax2"] < $_POST["nombremax1"]) {
    $min = $_POST["nombremax2"];
    $max = $_POST["nombremax1"];
    } else {
    $min = $_POST["nombremax1"];
    $max = $_POST["nombremax2"];
}
$nombretest = $_POST["nombretest"];

print("<p style='color:green;'>$nombretest est-il compris entre $min et $max ?</p><br><br>");
print("<p style='color:red;'>Oui $nombretest est compris entre $min et $max</p>");