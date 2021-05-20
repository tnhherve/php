<!-- 
        auteur : Joel Boudreau
        date :  2021
        but :
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exemple Array Assoc.</title>
    </head>
    <body>
        <?php
        $pays = array(  'USA' => 'Etats-Unis',
                        'CAN' => 'Canada',
                        'MEX' => 'Alberta');


        var_dump($pays);

        //echo $pays['USA'];



        $ages = array('Joel' => 37,
            'Michel' => 46,
            'David' => 30);


        echo $ages['Joel'];
        ?>


    </body>
</html>
