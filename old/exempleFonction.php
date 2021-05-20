<!-- 
        auteur : Joel Boudreau
        date :  2021
        but :
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exemple Fonction</title>
        <style type=text/css>


        </style>

    </head>
    <body>

        <?php

        function somme($nb1, $nb2) {
            $total = $nb1 + $nb2;
            return $total;
        }

        echo '5 + 10 = ' . somme(5, 10) . '<br />';
        echo '7 + 13 = ' . somme(7, 13) . '<br />';
        echo '2 + 4 = ' . somme(2, 4) . '<br />';
        ?>


    </body>
</html>
