<!--
        auteur : Herve Tamethe Nzokou
        date : 19 mai 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Question 1</title>
        <style type="text/css">
            body {
                margin : 100px;
            }
            h1 {
                text-align: center;

            }
        </style>
        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function () {
                
                $("#selectDept").change(function(){
                    var deptno = $("#selectDept").val();
                    
                    console.log(deptno);
                    
                    if (deptno != -1) {
                        var xhr = new XMLHttpRequest();
                    
                        xhr.open("GET", "getEmp.php?deptno="+deptno, true);

                        xhr.onreadystatechange = function() {

                            if (xhr.readyState === 4) {
                                $("#container_emps").html(xhr.responseText);
                            }
                        }

                        xhr.send(null);
                    }else
                        $("#container_emps").html("");
                });    

            });

      
        </script>
    </head>
    <body>
        <h1>Informations Départements et Employés</h1>
        <hr />
        <p>Veuillez sélectionner un département afin d'avoir l'information de ses employés</h1>
    <h2>Départements</h2>   
    <form>
        <select id="selectDept">
            <?php
            //$conn = mysqli_connect('localhost', 'proft_simpleuser', 'Prog*2021', 'profti_enclasse');
            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'scott');

            //compléter l'énoncé SQL
            $sql = 'SELECT deptno, dname, loc FROM dept ORDER BY loc DESC';
            $result = mysqli_query($conn, $sql);

            if (!$result) {  // si le $result est NULL
                echo mysqli_error($conn);  //affichage du message 
                exit; //sortie de notre programme.
            }
            echo "<option value=\"-1\">Choisir un département</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                //écrire le echo pour faire comme ceci <option value="10">ACCOUNTING--NEW YORK</option>
                echo "<option value = '".$row['deptno']."'>".$row['dname']."</option>"; 
            }
            
            mysqli_close($conn);
            ?>
        </select>
    </form>
    <hr />
    <div id="container_emps"></div>

</body>
</html>
