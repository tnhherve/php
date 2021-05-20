<!--

        auteur : Herve Tamethe Nzokou
        date : 19 mai 2021
        but :
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Plantes</title>


        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function () {


            });
        </script>
    </head>
    <body>
        <h1>Information sur les plantes</h1>
        
        <?php
        
            if (file_exists('plants.xml')) {
                
                
                $file = simplexml_load_file('plants.xml');
                
                
                echo "<ol>";
                
                foreach ($file->plant as $plant) {
                    echo "<li>"
                    . "<strong>{$plant->common}</strong> &harr; "
                    . "<em><a href='https://en.wikipedia.org/wiki/{$plant->botanical}'>{$plant->botanical}</a></em>"
                    . "</li>";
                    echo "<ul>"
                    . "<li>Prix : {$plant->price}</li>"
                    . "<li>Exposition : {$plant->light}</li>"
                    . "</ul>";
                    echo '<br>';
                    
                }
                
                echo "</ol>";
            }
            else
                echo "erreur";
            
        ?>
    </body>
</html>
