<?php

    /*
     * Auteur: Herve Tamethe Nzokou
     * Date:   13 mai 2021
     */

    if (isset($_GET['pays']) && is_numeric($_GET['pays'])) {
        
        $conn = mysqli_connect("localhost", "simpleuser", "simpleuser", "residence");
        
        $paysId = mysqli_escape_string($conn, $_GET['pays']);
        
        $query = "SELECT id, name FROM provinces WHERE pays_id = $paysId";
        
        $result = mysqli_query($conn, $query);
        
        $row = mysqli_fetch_all($result);
        
        if(mysqli_num_rows($result) == 0)
            echo json_encode("erreur");
        else
            echo json_encode ($row);

    }
    
    

?>

