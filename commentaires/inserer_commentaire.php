<?php

if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {


    $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'commentaires');
    //$conn = mysqli_connect('college-dev.com', 'proft_simpleuser', 'Prog*2021', 'profti_enclasse');

    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $commentaire = mysqli_real_escape_string($conn, $_POST['commentaire']);

    $sql = "insert into commentaires (nom,commentaire) VALUES ('$nom','$commentaire')";

    $result = mysqli_query($conn, $sql);
    echo mysqli_affected_rows($conn);

    //echo mysqli_num_rows($result);

    mysqli_close($conn);
} 
?>