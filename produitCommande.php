<!DOCTYPE html>
<!--
        auteur :Joel Boudreau
        date : 2021
       
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Joel Pièces d'Auto</title> 
        <style type="text/css">

            tr#first 
            {	
                background-color : darkolivegreen ;

            }
            tr#first td 
            {
                border : 1px solid black;
            }
            input[type=text] 
            {
                border : 1px solid black;
                height: 20px;

            }

            input[type=submit]
            {
                font-size : 16pt;
            }
            td 
            {
                padding : 5px;
            }

            table 
            {

                margin-left: auto;
                margin-right: auto;
                font-size : 18pt;
                font-family : Arial;
            }
            #buttonCell 
            {
                text-align : center;
            }

            h1 
            {
                text-align : center;

            }	

            body 
            {
                background-color : silver;
            }
            
            <?php
                define("PRIX_PNEU", 100);
                define("PRIX_HUILE", 10);
                define("PRIX_BOUGIE", 5);
                
                $pneux = 0;
                $huile = 0;
                $bougies = 0;
                $prixTotal = 0;
                $nbreTotal = 0;
                
            ?>
        </style>
    </head> 
    <body> 


        <h1>Joel Pièces d'auto</h1>
        <hr />
        <br />
        <h1>Commande produite a <?php echo date('H:i:s').' le '. date('d-m-y'); ?></h1>
        <?php
        
        if (isset($_POST['txtPneux']) && is_numeric($_POST['txtPneux'])){
            $pneux = $_POST['txtPneux'];
        } else {
            echo '';
        }
        
        if (isset($_POST['txtHuile']) && is_numeric($_POST['txtHuile'])){
            $huile = $_POST['txtHuile'];
        }
        
        if (isset($_POST['txtBougies']) && is_numeric($_POST['txtBougies'])){
            $bougies = $_POST['txtBougies'];
        }
        
        $nbreTotal = $huile + $bougies + $pneux;
        $prixTotal = $pneux*PRIX_PNEU + $huile*PRIX_HUILE + $bougies*PRIX_BOUGIE;
         
        echo "<ul>
            <li>Nombre total d'items: $nbreTotal</li>
            <li>Details de la commande</li>
            <ol>
                <li>Pneux: $pneux</li>
                <li>Huile: $huile</li>
                <li>Bougies: $bougies</li>
            </ol>
            <li>Prix Total: $$prixTotal</li>
        </ul>";
        ?>

        <br />
        <hr />
    </body> 
</html>
