<?php
require("DateHelper.inc.php");

if (!isset($_GET['recid'])) {
    header("Location: commpresse.php");
    exit;
}

$conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'commpresse');

mysqli_set_charset($conn, 'utf8');

$id = mysqli_real_escape_string($conn, $_GET['recid']);

$query = "SELECT titlefr, bodyfr, diffdate, sourcefr " .
        "FROM releases " .
        "WHERE recid=$id";

$result = mysqli_query($conn, $query);


if (!$result) {  // si le $result est NULL
    echo mysqli_error($conn);  //affichage du message 
    exit; //sortie de notre programme.
}


$row = mysqli_fetch_array($result);


$nrows = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="fr">
    <head>

        <meta charset="utf-8">
        <title>Pouce Vert: Communiqué de presse</title>

    </head>
    <body>

        <h1>Communiqué de presse</h1>

        <p><a href="commpresse.php">Retour à la liste</a></p>

        <?php if ($nrows == 0) { ?>
            Ce communiqué n'est pas disponible.
        <?php } else {
            ?>

            <h2><?php echo $row['titlefr']; ?></h2>

            <p>
                <strong>
                    <?php
                    $thedate = $row['diffdate'];
                    echo dateEnMots($thedate, 'fr') . " --";
                    ?>
                </strong>
                <?php
                $body = $row['bodyfr'];
                echo nl2br($body);
                //nl2br est une fonction qui traduit les /n en <br>
                ?>
            </p>

            <p>Source: <?php echo $row['sourcefr']; ?></p>

            <?php
        }
        mysqli_close($conn);
        ?>
    </body>
</html>
