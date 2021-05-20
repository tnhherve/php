<!--
        auteur :Joel Boudreau
        date : 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Commpresse</title>

    </head>

    <body>
        <h1>Liste des communiqués</h1>
        <ul>
            <?php
            require_once 'DateHelper.inc.php';
            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'commpresse');
            mysqli_set_charset($conn, 'utf8');

            $query = 'SELECT recid,titlefr,diffdate FROM releases';

            $result = mysqli_query($conn, $query);

            if (!$result) {  // si le $result est NULL
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo dateEnMots($row['diffdate'], "fr") .
                ",<a href=\"detail.php?recid={$row['recid']}\">{$row['titlefr']}</a>";
                echo '</li>';
            }
            mysqli_close($conn);
            ?>


        </ul>
    </body>
</html>