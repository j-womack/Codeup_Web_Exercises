<?php  

    function randomWord($filename) {
        $handle = fopen( $filename, 'r');
        $contents = trim(fread($handle, filesize($filename)));
        $wordsArray = explode(PHP_EOL, $contents);
        shuffle($wordsArray);
        return $randomWord = array_shift($wordsArray);
    }

    function coolThings($filename) {
        $handle = fopen( $filename, 'r');
        $contents = trim(fread($handle, filesize($filename)));
        $wordsArray = explode(PHP_EOL, $contents);
        shuffle($wordsArray);
        return $randomWords = array_slice($wordsArray, 0, 5);
    }

    $coolThings = coolThings('data/nouns.txt');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Server Name Generator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            background-image: url(img/dark_embroidery.png);
            font-family: 'Lora', serif;
            color: white;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <main class='container'>
    <h1>You should call your server:</h1>
    <h1><?php echo strtolower(trim(randomWord('data/adjectives.txt'))) . ucfirst(trim(randomWord('data/nouns.txt'))) ?></h1>

    <p>
        Five random nouns:
        <ol>
            <?php foreach ($coolThings as $thing) {?>
            <li><?php echo $thing; ?></li>     
            <?php } ?>
        </ol>
    </p>
</main>
</body>
</html>