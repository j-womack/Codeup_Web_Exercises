<?
    function fiveRandomWords($filename) {
        $handle = fopen( $filename, 'r');
        $contents = trim(fread($handle, filesize($filename)));
        $wordsArray = explode(PHP_EOL, $contents);
        shuffle($wordsArray);
        return $randomWords = array_slice($wordsArray, 0, 5);
    }


    function pageController() {
        $data = [];
        $data['fiveRandomNouns'] = fiveRandomWords('data/nouns.txt');
        $data['fiveThings'] = ['laptop', 'phone', 'backpack', 'mug', 'coffee'];
        return $data;
    }

    extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title>5 Random Nouns</title>
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
        <h1>5 Random Nouns</h1>
        <p>
            Five random nouns:
            <ol>
                <? foreach ($fiveRandomNouns as $noun):?>
                    <li><?= $noun; ?></li>     
                <? endforeach; ?>
            </ol>

            Five things at my desk:
            <ol>
                <? foreach ($fiveThings as $thing):?>
                    <li><?= $thing; ?></li>     
                <? endforeach; ?>
            </ol>
        </p>
    </main>
</body>
</html>