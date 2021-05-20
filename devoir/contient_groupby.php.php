<html>
    <head>
        <title>contient_groupby</title>
    </head>
    <body>
        <h1>Continent GROUP BY</h1>
        <?php
            $con = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'world');
           
            $sql = 'SELECT continent, COUNT(*) as nbre FROM country GROUP BY Continent ORDER BY nbre DESC';
            
            $result = mysqli_query($con, $sql);
            
            if (!$result) {  // si le $result est NULL
                echo mysqli_error($con);  //affichage du message 
                exit; //sortie de notre programme.
            }
            
            
            
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)){
            
                echo "<li><strong>{$row['continent']}</strong> nombre de pays : {$row['nbre']}</li>";
            }
            echo "</ul>";
        ?>

    </body>
</html>



