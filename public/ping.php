<?php
var_dump($_GET);

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
    <title>Counter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
    <a href="pong.php?hitPing=yes&hitPong=stay&ping=<?= $ping; ?>&pong=<?= $pong; ?>" class="btn btn-default">HIT</a>
    <br>
    <a href="pong.php?hitPing=no&hitPong=stay&ping=<?= $ping; ?>&pong=<?= $pong; ?>" class="btn btn-default">MISS</a>
    </div>
</main>
</body>
</html>