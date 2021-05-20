<!-- 
        auteur : Joel Boudreau
        date :  2021
        but :
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Provinces</title>
		<?php
                $provinces = array('Territoire du Yukon' => 'Whitehorse',
                    'Territoire du Nord-Ouest' => 'Yellownkife',
                    'Nunavut' => 'Igaluit',
                    'Colombie-Britannique' => 'Victoria',
                    'Alberta' => 'Edmunton',
                    'Saskatchewan' => 'Regina',
                    'Manitoba' => 'Winnipeg',
                    'Ontario' => 'Toronto',
                    'Quebec' => 'Quebec',
                    'Ile du Prince Edouard' => 'Charlettown',
                    'Terre-Neuve' => 'St.John\'s',
                    'Nouveau-Brunswick' => 'Fredericton',
                    'Nouvelle-Ecosse' => 'Halifax');
		?>
    </head>
    <body>
        <h1>Provinces et Capitales</h1>
        <h2>Sélectionne une province afin d'afficher sa capitale</h2>
        <form action="" method="">
            Nom : <input type="text" name="txtNom" /><br />
            
            <select name="provinces">
                <?php
                    // <option value="Fredericton">Nouveau-Brunswick</option>
                    foreach ($provinces as $prov => $capitale) {
                        echo "<option value=\"$capitale\">$prov</option>\n\t\t\t\t";
                        //echo '<option value="' . $capitale . '">'.$prov . '</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Afficher la capitale" />
        </form>

    </body>
</html>
