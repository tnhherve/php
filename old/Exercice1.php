<?php

    $min = 1;
    $max = 1000;
    
    echo '<h1>Exercice 1 php</h1>';
    echo '<hr/>';
    
    echo "<h2>le nombre impairs de $min a $max </h2><br/>";
    
    for ($i = $min; $i <= $max; $i++){
        if ($i%2 != 0)
            echo $i." ";
    }

    echo '<hr/>';
    
    echo "<h2>Calcul du factoriel de 8 </h2><br/>";
    
    $fact = 1;
    for ($i = 1; $i <= 8; $i++) {
        $fact *=$i;
    }
    
    echo "8! = $fact";
?>