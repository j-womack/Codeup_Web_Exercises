<?  
    function randomWord($filename) {
        $handle = fopen( $filename, 'r');
        $contents = trim(fread($handle, filesize($filename)));
        $wordsArray = explode(PHP_EOL, $contents);
        shuffle($wordsArray);
        return $randomWord = array_shift($wordsArray);
    }
    
    function serverNameGenerator() {
        $randomAdjective = strtolower(trim(randomWord('data/adjectives.txt')));
        $randomNoun = ucfirst(trim(randomWord('data/nouns.txt')));
        return $randomAdjective . $randomNoun;
    }


    function alliterative() {
        $randomAdjective = strtolower(trim(randomWord('data/adjectives.txt')));
        $randomNoun = strtolower(trim(randomWord('data/nouns.txt')));
        $randomAdjective = str_split($randomAdjective);
        $randomNoun = str_split($randomNoun);
        if ($randomAdjective[0] == $randomNoun[0]) {
            $randomAdjective = strtolower(implode('', $randomAdjective));
            $randomNoun = ucfirst(implode('', $randomNoun));
            return $randomAdjective . $randomNoun;
        } else {
            return alliterative();
        }
    }

    function pageController() {
        $data = [];
        $data['serverName'] = serverNameGenerator();
        $data['alliterative'] = alliterative();
        return $data;
    }

    extract(pageController());

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
        <h1><?= $serverName; ?></h1>
        <br>
        <h1>...or if you prefer an alliterative name:</h1>
        <h1><?= $alliterative; ?></h1>
    </main>
</body>
</html>