﻿<!--
        auteur :Joel Boudreau
        date : 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Commentaires Ajax</title>
        <link rel="stylesheet" type="text/css" href="comments.css" />

        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function () {
                $("#add").click(ajouterCommentaire);

            });

            function ajouterCommentaire() {
                var nom = $("#auteur").val();
                var commentaire = $("#comment").val();

                if (nom !== "" && commentaire != "") {

                    //creation des balises
                    var divPrinc = document.createElement("div");
                    divPrinc.className = "row";
                    //vPrinc.setAttribute("class", "row");
                    //divPrinc).addClass("row");
                    var label = document.createElement("label");
                    var divComment = document.createElement("div");
                    var ligne = document.createElement("hr");

                    //ajout du texte dans le label et la divComment
                    label.innerHTML = nom;
                    divComment.innerHTML = commentaire;


                    divPrinc.appendChild(label);
                    divPrinc.appendChild(divComment);

                    $("#comments")[0].appendChild(divPrinc);
                    $("#comments")[0].appendChild(ligne);

                    //effet de transition
                    $(divPrinc).hide();
                    $(divPrinc).fadeIn();

                    //vider les textbox et donner le focus
                    $("#auteur").val("");
                    $("#comment").val("");
                    $("#auteur").focus();

                    insererCommentaire(nom, commentaire);
                } else {
                    //vider les textbox et donner le focus
                    if (commentaire == "") {
                        $("#comment").val("Commentaire obligatoire");
                        $('#comment').effect("highlight", {color: 'red'}, 1500);
                        setTimeout(effacerCommentaire, 1500);
                    }

                    if (nom == "") {
                        $("#auteur").val("Nom obligatoire");
                        $('#auteur').effect("highlight", {color: 'red'}, 1500);
                        setTimeout(effacerNom, 1500);
                        
                    }
                     $("#add").attr("disabled","disabled");
                     setTimeout(replacerBouton,1500);
                }
            }
            function replacerBouton(){
                $('#add').removeAttr('disabled');
            }
            function effacerCommentaire(){
                $('#comment').val("")
            }
            function effacerNom(){
                $('#auteur').val("");
            }
            function insererCommentaire(nom, commentaire) {

                var xhr = new XMLHttpRequest();
                var queryStringPost = "nom=" + nom + "&commentaire=" + commentaire;
                xhr.open("POST", "inserer_commentaire.php", true);

                xhr.onreadystatechange = function () {

                    if (xhr.readyState === 4) {
                        // alert(xhr.responseText);

                    }
                };
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send(queryStringPost);


            }
        </script>		
    </head>
    <body>
        <div id="content">
            <h2>Articles</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div id="comments">
            <h2>Commentaires des lecteurs</h2>
            <?php
            $conn = mysqli_connect('localhost', 'simpleuser', 'simpleuser', 'commentaires');
            //$conn = mysqli_connect('college-dev.com', 'proft_simpleuser', 'Prog*2021', 'profti_enclasse');
            $sql = 'SELECT nom, commentaire FROM commentaires';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                echo '<div class="row">';
                echo "<label>{$row['nom']}</label>";
                echo "<div>{$row['commentaire']}</div>";
                echo '</div>';
                echo '<hr />';
            }
            mysqli_close($conn);
            ?>
        </div>
        <div id="leaveComment">
            <h2>Laissez un commentaire</h2>
            <div class="row"><label for="auteur">Votre nom:</label><input type="text" id="auteur" /></div>
            <div class="row"><label for="comment">Commentaire:</label><textarea cols="10" rows="5" id="comment"></textarea></div>
            <button id="add" >Ajout</button>
        </div>


    </body>
</html>