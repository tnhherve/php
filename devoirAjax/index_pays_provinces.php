<!--
        auteur :Herve Tamethe Nzokou
        date : 2021
       
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <!--Insertion du code CSS pour JQuery UI -->
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">

        <title>Exercice: Dépendance de combo box</title>

        <style type="text/css">

            .hidden{
                display: none;
            }

            label{
                font-weight: bolder;
            }

            dl{
            }

            dt{
                width: 15%;
                float: left;
            }

            dd{
                margin-left: 0;
                margin-bottom: 10px;
            }

            ul.erreurs{
                font-weight: bolder;
                color: #cc0000;
                margin-left: 0;
                padding-left: 0;
                list-style-type: none;
            }

            #erreurs-globales{
                background: #cc0000;
                color: white;
                font-weight: bolder;
                width: 40%;
            }

            #erreurs-globales p{
                margin: 5px;
                padding-top: 5px;
            }

            #erreurs-globales ul#champs-erreurs{
                background: #f0f0f0;
                padding-top: 5px;
                padding-bottom: 5px;
                list-style-type: square;
                margin: 0;
                color: black;
                font-weight: normal;
            }

            #actions{
                margin-left: 15%;
            }

            #resultat{
                font-weight: bolder;
            }


            fieldset{
                border: 1px solid #781351;
                width: 60em;
            }

            legend{
                color: #fff;
                background: #ffa20c;
                border: 1px solid #781351;
                padding: 2px 6px;
            }
        </style>
        <!--Insertion du code Javascript pour JQuery et Ajax -->

        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" 
        src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" 
        src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript">
            
            function getPays(){
                var xhr = new XMLHttpRequest();
                    
                xhr.open("GET", "getPays.php", true);
                xhr.onreadystatechange = function(){
                    
                    if (xhr.readyState == 4){
                        //console.log(xhr.responseText);
                        console.log(JSON.parse(xhr.responseText));
                        var tabPays = JSON.parse(xhr.responseText);
                        var select = ""
                        for (var i = 0; i < tabPays.length; i++) {
                            select+="<option value='"+tabPays[i][0]+"'>"+tabPays[i][1]+"</option>"
                        }
                        
                        $("#pays").html(select);
                   }
                }
                    
                xhr.send(null);
            }
            
            function getProvinces(){
                
                var xhr = new XMLHttpRequest();
                //pays = 1; 
                xhr.open("GET", "getProvince.php?pays="+1, true);
                xhr.onreadystatechange = function(){
                    
                    if (xhr.readyState == 4){
                        //console.log(xhr.responseText);
                        console.log(JSON.parse(xhr.responseText));
                        var tabProvince = JSON.parse(xhr.responseText);
                        var select = ""
                        for (var i = 0; i < tabProvince.length; i++) {
                            select+="<option value='"+tabProvince[i][0]+"'>"+tabProvince[i][1]+"</option>"
                        }
                        
                        $("#province").html(select);
                   }
                }
                    
                xhr.send(null);
                
                $("#pays").change(function(){
                   
                   var pays = $("#pays").val();
                   console.log(pays);
                   var xhr = new XMLHttpRequest();
                    
                    xhr.open("GET", "getProvince.php?pays="+pays, true);
                    xhr.onreadystatechange = function(){

                        if (xhr.readyState == 4){
                            //console.log(xhr.responseText);
                            console.log(JSON.parse(xhr.responseText));
                            var tabProvince = JSON.parse(xhr.responseText);
                            var select = ""
                            for (var i = 0; i < tabProvince.length; i++) {
                                select+="<option value='"+tabProvince[i][0]+"'>"+tabProvince[i][1]+"</option>"
                            }

                            $("#province").html(select);
                       }
                    }

                    xhr.send(null);
                });
            }
            
            $(document).ready(function () {

                getPays();
                getProvinces();
            });


        </script>


    </head>

    <body>

        <h1>Créer un compte utilisateur</h1>
        <fieldset>
            <legend>Entrer votre information</legend>
            <form name="creerCompteForm" action="creer_compte" method="POST">

                <dl>

                    <dt>	<label>Code usager</label>:</dt>
                    <dd><input type="text" name="alias" /></dd>

                    <dt>	<label>Prénom</label>:</dt>
                    <dd><input type="text" name="alias" /></dd>

                    <dt>	<label>Nom</label>:</dt>
                    <dd><input type="text" name="alias" /></dd>

                    <dt>	<label>Pays de résidence</label>:</dt>
                    <dd id="liste-pays">
                        <!-- insertion du select pour pays -->
                        <select name="pays" id="pays">
                        
                        </select>

                    </dd>

                    <dt><label>Province de résidence</label>:</dt>
                    <dd id="liste-provinces">
                        <!-- insertion du select pour provinces -->
                        <select name="province" id="province"></select>
                    </dd>

                </dl>

                <div id="actions">
                    <input type="submit" value="Créer compte" />
                </div>         


        </fieldset>
    </form>

</body>

</html>
