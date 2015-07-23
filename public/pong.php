<?php
// var_dump($_GET);

function pageController(){
    $data = [];

    if(isset($_GET['ping'])) {
        if ($_GET['hitPing'] == 'yes') {
            $_GET['ping']++;
            $data['ping'] = $_GET['ping'];
        } elseif ($_GET['hitPing'] == 'no') {
            $_GET['ping']--;
            $data['ping'] = $_GET['ping'];
        } elseif ($_GET['hitPing'] == 'stay') {
            $data['ping'] = $_GET['ping'];
        }
    } else {
        $data['ping'] = 0;
    }

    if(isset($_GET['pong'])) {
        if ($_GET['hitPong'] == 'yes') {
            $_GET['pong']++;
            $data['pong'] = $_GET['pong'];
        } elseif ($_GET['hitPong'] == 'no') {
            $_GET['pong']--;
            $data['pong'] = $_GET['pong'];
        } elseif ($_GET['hitPong'] == 'stay') {
            $data['pong'] = $_GET['pong'];
        }
    } else {
        $data['pong'] = 0;
    }

        return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ping/Pong</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            background-image: url(img/dark_embroidery.png);
            font-family: 'VT323';
            color: white;
        }
        .bigbtn {
            font-size: 2em;
        }
        h1 {
            font-size: 4em;
        }
    </style>
</head>
<body>
    <main class="container">
    <div class='row'>
        <h1 class="col-xs-6">Ping: <?= $ping; ?></h1>
        <h1 class="col-xs-6 text-right">Pong: <?= $pong; ?></h1>
    </div>

    <br>
    <div class='row text-right'>
        <h2>Pong's turn:</h2>
    <a href="ping.php?hitPong=yes&hitPing=stay&pong=<?= $pong; ?>&ping=<?= $ping; ?>" class="btn btn-default bigbtn">HIT</a>
    <a href="ping.php?hitPong=no&hitPing=stay&pong=<?= $pong; ?>&ping=<?= $ping; ?>" class="btn btn-default bigbtn">MISS</a>
 </div>
</main>
</body>
</html>