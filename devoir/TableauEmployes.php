<!-- 
    name: Herve Tamethe Nzokou
    Date: 19 avril 2021
    But: Afficher la liste des employés
-->

<html>
    <head>
        <title>Tableau des employés</title>
        
        <style>
            #content{
                text-align: center;
            }
            table, th, tr, td{
                border: solid 1px black;
            }
            table{
                table-layout: auto;
                width: 60%;
                margin: 0 auto;
            }
            tr, td{
                font-size: 15px;
                padding: 5px;
                text-align: right;
            }
            th{
                background-color: orange;
                text-transform: uppercase;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
            $con = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'scott');
           
            $sql = 'SELECT * FROM emp ORDER BY job ASC';
            
            $result = mysqli_query($con, $sql);
            
            if (!$result) {  // si le $result est NULL
                echo mysqli_error($con);  //affichage du message 
                exit; //sortie de notre programme.
            }
        ?>
        <div id="content">
            <h1>Tableau des employés</h1>
            <table>
                <tr>
                    <?php
                        
                        $row_fiels = mysqli_fetch_fields($result);
                        for ($i = 0; $i < count($row_fiels); $i++) {
                            echo "<th>{$row_fiels[$i]->name}</th>";
                        }
                    ?>    
                </tr>
                <?php
            
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr>"
                            ."<td>{$row['empno']}</td>"                       
                            ."<td>{$row['ename']}</td>"
                            ."<td>{$row['job']}</td>"
                            ."<td>{$row['mgr']}</td>"
                            ."<td>{$row['hiredate']}</td>"
                            ."<td>{$row['sal']}</td>"
                            ."<td>{$row['comm']}</td>"
                            ."<td>{$row['deptno']}</td>"
                        ."</tr>"; 
                   }
                      
                ?>
                
            </table>
            <?php 
                $taille = count($row_fiels);
                echo "<h4>Nous avons $taille employés dans notre compagnie</h4>";
            ?>
        </div>    
    </body>
</html>



