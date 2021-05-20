<!-- 
       auteur : Joel Boudreau
       date :  2021
       but :
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exemple Tableau</title>
    </head>
    <body>
        <?php
        $saisons = array('ete', 'automne', 'hiver', 'printemps');
        
        //var_dump($saisons);
        
        for ($i = 0; $i < count($saisons); $i++) {
            echo $saisons[$i] . '<br />';
        }
        
        echo '<hr />';
        
        sort($saisons);
        foreach ($saisons as $valeur) {
            echo "$valeur <br />";
        }
        
        echo '<hr />';
        rsort($saisons);
        foreach ($saisons as $key => $value) {
            echo "$key $value <br />";
        }
        ?>


    </body>
</html>
