<?php

    if (isset($_GET['chaine']) && !empty($_GET['chaine'])) {
           
            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'world');

            $chaine = strtoupper(mysqli_real_escape_string($conn,$_GET['chaine']));
            $query = "SELECT name, code from country WHERE UPPER(name) like '%$chaine%'";
            

            $result = mysqli_query($conn, $query);
            if (!$result) {  
                echo mysqli_error($conn);  
                exit; 
            }

            $lettres = htmlspecialchars($_GET['chaine']);
            
            $data = "<h2>Affichage des pays avec la chaine '$lettres' dans leur nom</h2>";

            $data = $data.'<ol>';
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $data."\t<li>{$row['name']}-{$row['code']}</li>\n";
            }
            $data = $data.'</ol><br /><br />';

            $data = $data."<div class=\"div_button\"><button class=\"btn btn-primary\" type=\"button\">";
            $data = $data."Pays # <span class=\"badge\">" . mysqli_num_rows($result) . "</span>";
            $data = $data."</button></div>";
            
            echo $data;
            
            mysqli_close($conn);
    }

