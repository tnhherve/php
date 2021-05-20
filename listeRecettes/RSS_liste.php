<!-- 
	auteur : Joel Boudreau
	date :  2020
	but :
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>RSS Liste</title>
                <style type="text/css">
                    h1,h2 { text-align: center;}
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
               
                echo "<ol>";
                foreach ($rss->channel->item as $item){
                    echo "<li>$item->title</li>";
                }
                echo "</ol>";
                
            ?>
            </div>
	</body>
</html>