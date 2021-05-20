<!-- 
        auteur : **** Herve Tamethe Nzokou ****
        date :  25 mars 2021
        but : PROG1300 Test 2 Question 1
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
       
        <title><?php echo date('Y-m-d H:i:s'); ?></title>
        <style type="text/css">

            table, td, th{
                border-style : solid ;
                border-color : black;
                border-width : 1px;
                text-align : right;
            }
            th  {
                background-color : silver;
                font-weight : bold;
                text-align : center;
            }



            h1,h2, p {text-align : center}
            table.center {margin-left:auto; margin-right:auto;}

            form {text-align : center}
            img {margin-left:auto; 
                 margin-right:auto;
                 display:block; 
                 padding : 20px;
                 border: 2px solid black;}

        </style>
        <?php
        $aVilles = array('New York' => 8008278,
            'Los Angeles' => 3694820,
            'Chicago' => 2896016,
            'Houston' => 1953631,
            'Philadelphia' => 1517550,
            'Phoenix' => 1321045,
            'San Diego' => 1223400,
            'Dallas' => 1188580,
            'San Antonio' => 1144646,
            'Detroit' => 951270,
            'Boston' => 2756345);
        
        arsort($aVilles);
        
        function creerTableVille($array){
                $affichage = "<table>
                <tr>
                    <th>Villes</th>
                    <th>Population</th>
                </tr>";
            
                foreach ($array as $key => $value) {
                    $affichage = $affichage . "<tr>"
                        . "<td>$key</td>"
                        . "<td>".number_format($value, 0, '', ',')."</td>"
                        . "</tr>";
                }

                $affichage = $affichage."</table>";

                echo $affichage;
        }
        
        function retournerImageAuHasard($array){
            $cle = array_rand($array);
            $path = "imagesVilles/$cle.jpg";
            return $path;
        }
        
        $total_population = 0;  
        $nbre_ville = count($aVilles);
        
        foreach ($aVilles as $key => $value) {
            $total_population += $value;
        }
        ?>

    </head>
    <body>
        
        <h2>Statistiques Villes des États-Unis</h2>
       
    <center>
            
        <?php
                creerTableVille($aVilles);
                echo "<p>Il y'a $nbre_ville pour un total de ".number_format($total_population, 0, '', ',')." de population</p>";
                echo "<img src='".retournerImageAuHasard($aVilles)."'/>";
        ?>
           
    </center>
        
        
            
        
        <p>

        </p>
        <br />
		
    </body>
</html>
