<!-- 
        auteur : Joel Boudreau
        date :  2021
        but :
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice Fonction</title>
        <?php
        
        $provinces = array('NB' => 'Nouveau-Brunswick',
            'QC' => 'Québec',
            'NE' => 'Nouvelle-Écosse',
            'TN' => 'Terre-Neuve',
            'AL' => 'Alberta');

        $saisons = array('été', 'automne', 'hiver', 'printemps');
        
        function creerSelect($array,$valeurName){
            
            echo "<select name=\"$valeurName\">\n\t\t\t\t";
            //echo '<select name="' . $valeurName . '">';
            
            foreach ($array as $key => $value) {
                echo "<option value=\"$key\">$value</option>\n\t\t\t\t";
            }
            
            echo "</select>";
            
        }
        
        ?>
    </head>
    <body>
        <h1>Test des fonctions</h1>
     
        <form>	
            <?php
				creerSelect($provinces,"provinces");
                                echo "<br /><br />";
				creerSelect($saisons,"saisons");
            ?> 
       </form>

    </body>
</html>
