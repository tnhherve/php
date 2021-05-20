<?php

    if (isset($_GET['zipcode']) && is_numeric($_GET['zipcode'])) {
        $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'zipcode');

        $zipcode = strtoupper(mysqli_real_escape_string($conn,$_GET['zipcode']));
        $query = "SELECT city, state from zipcodes WHERE zipcode = $zipcode";
            
        $result = mysqli_query($conn, $query);
        
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) == 1) {  
            echo json_encode($row);
        }
        else 
        {
            json_encode("erreur");
        }
        
    }

?>

