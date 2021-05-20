<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style type="text/css">
            h1,h2 {
                text-align : center;
            }

            body {
                margin : 100px;
                background-color : silver;
            }




            div {
                margin : 0 auto;
            }
            .important {
                font-weight: bold;
                text-align : center;
            }

        </style>
        <title>Employés</title>

    </head>
    <body>
        <h1>Système des ressources humaines</h1>
        <br />
        <?php
        if (isset($_GET['deptno']) && is_numeric($_GET['deptno'])) {


            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'scott');

            echo "<h2>Employés du département " . htmlspecialchars($_GET['deptno']) . "</h2>";

            $deptno = mysqli_real_escape_string($conn, $_GET['deptno']);

            $query = "SELECT * FROM emp  WHERE deptno=$deptno ORDER BY sal DESC";
            

            $result = mysqli_query($conn, $query);

            if (!$result) {  // si le $result est NULL
                echo mysqli_error($conn);  //affichage du message
                exit; //sortie de notre programme.
            }

            echo '<hr />';

            while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['ename']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">No : <?php echo $row['empno']; ?></h6>
                        <p class="card-text"><strong>Salaire:</strong>$<?php echo $row['sal']; ?>.00 <strong>job:</strong> <?php echo ucwords(strtolower($row['job'])); ?></p>
                    </div>
                </div>
                <br />

                <?php
            }



            echo '<p class="important">Il y a ' . mysqli_num_rows($result) . ' employé(s) dans le département ' . htmlspecialchars($_GET['deptno']) . '</p>';

            mysqli_close($conn);
        } else {
            echo '<h2>Problème au niveau du transfert</h2>';
        }
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
