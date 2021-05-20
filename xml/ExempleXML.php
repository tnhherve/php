<!-- 
        auteur : Joel Boudreau
        date :  2021
        but :
-->
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
		<title>Exemple XML</title>
	</head>
	<body>
            <?php
                $xml = simplexml_load_file('hello.xml');
                
                echo $xml . "<br />";
                
                $xmlContacts = simplexml_load_file('contacts.xml');
                
                echo $xmlContacts->contact[1]->prénom . "<br />";
                echo $xmlContacts->contact[1]['id'] . "<br />";
                
                echo "<hr />";
           
                echo "<ul>";
                foreach ($xmlContacts->contact as $c) {
                    echo "<li>{$c->nom} <strong>{$c->prénom}</strong> {$c['id']} </li>";
                }
                
                echo "</ul>";
                
                
                $recette = simplexml_load_file('gateau_aux_carottes.xml');
                
                echo $recette['calories'];
                
                echo "<br />{$recette->nom}<br />";
                echo "<br />{$recette->description}<br />";
                
            ?>
	</body>
</html>