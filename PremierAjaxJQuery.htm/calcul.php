<?php
/*
 *   auteur : Herve Tamethe Nzokou
 *   date :  03 mai 2021
 *   but : calculer avec une requetes ajax
 *   fichier: calcul.php
 * 
 */
    if (isset($_GET['nb1']) && is_numeric($_GET['nb1']) && isset($_GET['nb2']) && is_numeric($_GET['nb2'])){
        $nbr1 = $_GET['nb1'];
        $nbr2 = $_GET['nb2'];
        $reponse = $nbr1 + $nbr2;
        echo "La reponse est : ".$reponse;
    }
    else
        echo "<strong>Erreur</strong> Une ou plusieurs valeurs ne sont pas numeriques";

?>

