'<!-- 
  Name: Herve Tamethe Nzokou
  Date: 14 avril 2021
  But: Manipulation des chaines de catactères en php
-->

<html>
    <head>
        <title>Devoir 1</title>
    </head>
    <body>
        <h1>Devoir 1 Fonctions pour String</h1>
        <form method="GET">
            <table >
                <tr>
                    <td><input type="text" name="txtChaine" size="70" /></td>
                    <td><input type="submit" value="Traiter" /></td>
                </tr>
            </table>
        </form>
        
        <hr/>
        
        <?php
        
            if (isset($_GET['txtChaine']) && !empty($_GET['txtChaine'])) {
                $chaine = $_GET['txtChaine'];
                echo "<p>La chaine est : $chaine</p>";
                
                $chaineMajus = strtoupper($chaine);
                echo "<p>La chaine en majuscule est : $chaineMajus</p>";
                
                $taille = strlen($chaine);
                echo "<p>La chaine est d'une longueur de $taille caractère(s)</p>";
                
                $chaineInvers = strrev($chaine);
                echo "<p>La chaine affichee a l'envers est : $chaineInvers </p>";
                
                $chaineAjust = str_pad($chaine, 20, "*", STR_PAD_BOTH);
                echo "<p>La chaine embellie avec des * sur 20 caracteres totals: $chaineAjust</p>";
                
                $chaineInitCap = ucfirst($chaine);
                echo "<p>La chaine en initcap : $chaineInitCap</p>";
                
                $nbreE = substr_count($chaineMajus, 'E');
                echo "<p>La chaine possede $nbreE 'e'</p>";
                
                $tabMot = explode(" ", $chaine);
                echo "<p>Les mots de la chaine tapée sont :</p>";
                echo "<ul>";
                
                for ($i = 0; $i < count($tabMot); $i++){
                    echo "<li>$tabMot[$i]</li>";
                }
                
                echo "</ul>";
                
                $nbreMot = count($tabMot);
                echo "<p>Il y a $nbreMot mot(s) dans la phrase</p>";
            }
        ?>
        
    </body>
</html>






