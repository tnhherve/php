<!--
        auteur :Herve Tamethe
        date : 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>template</title>
        <script>



        </script>
    </head>

    <body>
       <?php
	   
        $name = "Herve Yann";
        
        echo $name;
        
        for ($index = 0; $index < 10; $index++) {
            echo "<h2>Bonjour ".strrev($name)." </h2>";
        }
        
        $nb1 = 'Joel';
        $nb2 = 'Boudreau';
        //$result = $nb1 + $nb2;

        echo '$nb1 $nb2';        
	   
	?>
    </body>
</html>