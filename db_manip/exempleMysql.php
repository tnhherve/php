<!--
        auteur :Joel Boudreau
        date : 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exemple MySQL</title>
    </head>
    <body>
        <h1>Exemple Mysql</h1>
        <?php
        $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'compresse');


        $sql = 'SELECT * FROM releases';

        $result = mysqli_query($conn, $sql);
  
       
        if (!$result) {  // si le $result est NULL
            echo mysqli_error($conn);  //affichage du message 
            exit; //sortie de notre programme.
        }

        //https://www.py4u.net/discuss/24134
        while ($row = mysqli_fetch_array($result)) {
            echo $row[1] . ' ' . $row[0] . '<br />';
         
        }
        echo mysqli_num_rows($result);
        mysqli_close($conn);
        ?>
    </body>
</html>