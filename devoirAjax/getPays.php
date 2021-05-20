<?php

    /*
     * Auteur: Herve Tamethe Nzokou
     * Date:   13 mai 2021
     */

    $conn = mysqli_connect("localhost", "simpleuser", "simpleuser", "residence");
    
    $query = "SELECT id, name FROM pays";
    
    $result = mysqli_query($conn, $query);
    
    if (!$result){
        echo mysqli_error($conn);
    }
    
    //echo $results;
    
    $row = mysqli_fetch_all($result);
   
    if (mysqli_num_rows($result) == 0)
        echo "erreur";
    else
        echo json_encode($row);
    
    
 ?>

