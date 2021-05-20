<!-- 
        auteur : Joel Boudreau
        date :  2021
        but :
-->
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
		<title>RSS Liste</title>
                <style type="text/css">
                    h1,h2,h3 { text-align: center;}
                    body { margin: 50px 200px;}
                    ol {margin : 0 auto;}
                </style>
	</head>
	<body>
            <h1>Liste d'un RSS Feed</h1>
            <div>
            <?php
                $rss = simplexml_load_file("https://rss.itunes.apple.com/api/v1/ca/itunes-music/hot-tracks/all/10/explicit.rss");
                
                echo "<h2>{$rss->channel->title}</h2>";
                echo "<h3>Date : {$rss->channel->lastBuildDate}</h3>";
               
                echo "<ol>";
                foreach ($rss->channel->item as $item){
                    echo "<li>$item->title";
                    echo "<ul>";
                    echo "<li>desc : {$item->description}</li>";
                    echo "<li>catégories :";
                    
                    $nbCat = count($item->category);
                    for($i = 1; $i < $nbCat; $i++) //commence à 1 pour ne pas faire afficher la 1e categorie
                        echo "{$item->category[$i]} ";
                    echo "</li>";
                    echo "<li>date : $item->pubDate</li>";
                    echo "</ul>";
                    echo "</li>";
                }
                echo "</ol>";
                
            ?>
            </div>
	</body>
</html>