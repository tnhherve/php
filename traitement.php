<!DOCTYPE html>
<!--
        auteur :Joel Boudreau
        date : 2021
       
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Traitement du formulaire</title>
    </head>
    <body>
        <?php
        if (isset($_GET['txtNom']) && isset($_GET['txtCourriel'])){
            echo 'Bienvenue '.$nom = $_GET['txtNom'].'<br/>';
            echo 'Ton courriel est: '.$email = $_GET['txtCourriel'];
        } else {
            echo 'Probleme lors du passage du formulaire';
        }
        ?>
        

    </body>
</html>
