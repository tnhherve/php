<?php

    /*
     * Auteur: Herve Tamethe Nzokou
     * Date:   19 mai 2021
     */

    if (isset($_GET['deptno']) && is_numeric($_GET['deptno'])) {
        
        $conn = mysqli_connect("localhost", "simpleuser", "simpleuser", "scott");
        
    
        $deptno = mysqli_escape_string($conn, $_GET['deptno']);
        
        $query = "SELECT empno, ename, job, sal FROM emp WHERE deptno = $deptno ORDER BY sal DESC";
        
        $result = mysqli_query($conn, $query);
        
        if (!$result) {  
            echo mysqli_error($conn);  
            exit; 
        }
        
        echo "<ul>";
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>".$row['empno']." ".$row['ename']." $".$row['sal']." ".$row['job']."</li>";
            $total +=  $row['sal'];
        }
        
        echo "</ul>";
        
        echo "<p>Le total des salaires des employés du departement $deptno est de $$total</p>";
            
        mysqli_close($conn);
    }

?>

