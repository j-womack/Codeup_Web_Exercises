<?php
require 'functions.php';
require '../Input.php';

function pageController(){
    $data = [];

    if(Input::has('ping')) {
        if (Input::get('hitPing') == 'yes') {
            $_GET['ping']++;
            $data['ping'] = $_GET['ping'];
        } elseif (Input::get('hitPing') == 'no') {
            $_GET['ping']--;
            $data['ping'] = $_GET['ping'];
        } elseif (Input::get('hitPing') == 'stay') {
            $data['ping'] = $_GET['ping'];
        }
    } else {
        $data['ping'] = 0;
    }

    if(Input::has('pong')) {
        if (Input::get('hitPong') == 'yes') {
            $_GET['pong']++;
            $data['pong'] = $_GET['pong'];
        } elseif (Input::get('hitPong') == 'no') {
            $_GET['pong']--;
            $data['pong'] = $_GET['pong'];
        } elseif (Input::get('hitPong') == 'stay') {
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
    <div class='row text-left'>
        <h2>Ping's turn:</h2>
    <a href="pong.php?hitPing=yes&hitPong=stay&ping=<?= $ping; ?>&pong=<?= $pong; ?>" class="btn btn-default bigbtn">HIT</a>
    <a href="pong.php?hitPing=no&hitPong=stay&ping=<?= $ping; ?>&pong=<?= $pong; ?>" class="btn btn-default bigbtn">MISS</a>
    </div>
</main>
</body>
</html>