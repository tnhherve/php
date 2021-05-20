<!-- 
    name: Herve Tamethe Nzokou
    Date: 27 avril 2021
    But: Afficher les pays
-->

<html>
    <head>
        <title>Pays</title>
        
        <style>
            table {margin-left:auto; margin-right:auto;}
            table, td{

                border-style : solid ;
                border-color : black;
                border-width : 1px;
                text-align : right;

            }

            td , th {padding : 20px;}
            th  {
                background-color : lightblue;
                font-weight : bold;
                text-align : center;
                border-style : solid ;
                border-color : black;
                border-width : 1px;
            }



            h1 ,h2, h3{text-align:center;}
        </style>
    </head>
    <body>
        <?php
            $con = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'world');
           
            $sql = 'SELECT Code, Name, Continent, LifeExpectancy, Population FROM country ORDER BY LifeExpectancy DESC ,Name ASC';
            
            $result = mysqli_query($con, $sql);
            
            if (!$result) {  // si le $result est NULL
                echo mysqli_error($con);  //affichage du message 
                exit; //sortie de notre programme.
            }
        ?>
      
            <h1>Pays</h1>
            <table>
                <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>CONTINENT</th>
                    <th>LIFE EXPECTANCY</th>
                    <th>POPULAIRE</th>
                    <th>VILLES</th>
                </tr>
                <?php
            
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr>"
                            ."<td>{$row['Code']}</td>"                       
                            ."<td>{$row['Name']}</td>"
                            ."<td>{$row['Continent']}</td>"
                            ."<td>{$row['LifeExpectancy']}</td>"
                            ."<td>{$row['Population']}</td>"
                            ."<td><a href='villes.php?code={$row['Code']}&pays={$row['Name']}'>Afficher les villes</a></td>"
                        ."</tr>"; 
                   }
                      
                ?>
                
            </table>
            <?php 
                $taille = count($row_fiels);
                echo "<h4>Nous avons $taille employés dans notre compagnie</h4>";
            ?>
           
    </body>
</html>



