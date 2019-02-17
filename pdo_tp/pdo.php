<?php
/**
 * Created by PhpStorm.
 * User: ayden
 * Date: 14/02/19
 * Time: 14:13
 */

try {
    $connexion = new PDO("mysql:host=localhost;dbname=tp_php", "admin", "4b3fKv28D7NS"); // connexion à la BDD
} catch (Exception $e) {
    print($e);
}