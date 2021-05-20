<!--
        auteur :Joel Boudreau
        date : 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Afficher Pays</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style type="text/css">
            h2 {
                text-align: center;
            }

            form {
                width: 300px;
                margin: 0 auto;
            }

            .big {
                font-size: 18pt;
            }


            select {
                margin-right: 25px;
            }

            ol {
                width: 450px;
                margin: 0 auto;
                font-size: 14pt;
            }

            body {
                background-color: silver;
                margin: 25px;
            }

            p {
                font-size: 14pt;
                text-align: center;
            }

            h1 {
                text-align: center;
            }


            .div_button {
                margin: 10px 500px;
            }
        </style>

    </head>
    <body>
        <div class="jumbotron centered">
            <h1>Affichage des Pays</h1>

        </div>
        <br/>
        <form action="afficherPaysTextBox.php" method="get">
            <div>
                <label class="big">Rechercher des pays:
                    <input type="text" name="txtPays"

                           value="<?php
                           if (isset($_GET['txtPays'])) {
                               echo htmlspecialchars($_GET['txtPays']);
                           }
                           ?>"/>
                </label>
                <button class="btn  btn-primary btn-lg " type="submit">Afficher <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>
        <br/>
        <br/>
        <?php
        if (isset($_GET['txtPays']) && !empty($_GET['txtPays'])) {
            //$conn = mysqli_connect('college-dev.com', 'proft_simpleuser', 'Prog*2021', 'profti_enclasse');
            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'world');


            //' union select name,countrycode from city where name like '
            $chaine = strtoupper(mysqli_real_escape_string($conn,$_GET['txtPays']));
            $query = "SELECT name, code from country WHERE UPPER(name) like '%$chaine%'";
            echo $query;

            $result = mysqli_query($conn, $query);
            if (!$result) {  // si le $result est NULL
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }

            $lettres = htmlspecialchars($_GET['txtPays']);

            echo "<h2>Affichage des pays avec la chaine '$lettres' dans leur nom</h2>";

            echo '<ol>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo "\t<li>{$row['name']}-{$row['code']}</li>\n";
            }
            echo '</ol><br /><br />';

            //echo '<p>Il y a ' . mysqli_num_rows($result) . ' pays débutant par ' . $lettre . '</p>';
            //info sur le nombre de pays retournés afficher dans un badger de Bootstrap
            echo "<div class=\"div_button\"><button class=\"btn btn-primary\" type=\"button\">";
            echo "Pays # <span class=\"badge\">" . mysqli_num_rows($result) . "</span>";
            echo "</button></div>";
            mysqli_close($conn);
        }
        ?>

    </body>
</html>