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
        <?php
            
        ?>
        
        <div class="jumbotron centered">
            <h1><span class="glyphicon glyphicon-search"></span> Affichage des Pays <span
                    class="glyphicon glyphicon-search"></span></h1>

        </div>
        <br/>
        <form action="afficherPays.php" method="get">
            <select class="form-control" name="lettre">
                <?php
                
                foreach (range('A','Z') as $letter) {
                    echo "<option value='$letter'>$letter</option>";
                }
                
                ?>
            </select>
            
            <br />
            <button class="btn  btn-primary big" type="submit">Afficher <span class="glyphicon glyphicon-search"></span></button>
        </form>
        
        
            <?php
            
            if (isset($_GET['lettre']) && !empty($_GET['lettre'])){
                
                $lettre = $_GET['lettre'];
                echo "<h1>Affichage des pays debutant par $lettre </h1>";
                
                $con = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'world');
                
                $sql = "SELECT code, name FROM country WHERE name LIKE '$lettre%'";
                
                $result = mysqli_query($con, $sql);

                if (!$result) {  // si le $result est NULL
                    echo mysqli_error($con);  //affichage du message 
                    exit; //sortie de notre programme.
                }
                
                $i = 0;
                echo "<ol>";
                while ($row = mysqli_fetch_assoc($result)){

                    echo "<li>{$row['name']} - {$row['code']}</li>";
                    $i++;
                }
                echo "</ol>";
            }

            ?>
            
       
        <br/>
        <br/>
        <center>
            <button type="button" class="btn btn-primary centered">
            Pays # <span class="badge badge-light"><?php echo $i; ?></span>
            </button>
        </center>    
        <?php
        
        ?>

    </body>
</html>