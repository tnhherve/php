<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <style type="text/css">
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
        <title>Villes</title>

    </head>
    <body>
        <br />
        <?php
        if (isset($_GET['code']) && isset($_GET['pays'])) {
            
            $pays = htmlspecialchars($_GET['pays']);
            $code = htmlspecialchars($_GET['code']);

            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'world');
            
            
            echo "<h2>Villes des pays $pays($code)</h2>";

            $codePays = mysqli_real_escape_string($conn, $_GET['code']);

            $query = "SELECT ID, Name, District, Population FROM city WHERE CountryCode='$codePays'";
            

            $result = mysqli_query($conn, $query);

            if (!$result) {  // si le $result est NULL
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }
            
            $nbreVille = mysqli_num_rows($result);
            
            if ($nbreVille > 0){
            ?>

            <table>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DISTRICT</th>
                        <th>POPULATION</th>
                    </tr>
            <?php
               

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>"
                                ."<td>{$row['ID']}</td>"                       
                                ."<td>{$row['Name']}</td>"
                                ."<td>{$row['District']}</td>"
                                ."<td>{$row['Population']}</td>"
                            ."</tr>"; 
                }

                mysqli_close($conn);

            ?>
               </table>
                <?php 
                    echo '<h3>Il y a ' . $nbreVille . ' ville(s) dans le pays '.$pays.'</h3>';
                ?>     
            <?php
        
            } else {
                echo '<h3>Aucune ville dans le pays '.$pays.'</h3>';
            }
        
        } else {
            echo '<h2>Problème au niveau du transfert</h2>';
        }
        ?>
        
    </body>
</html>
