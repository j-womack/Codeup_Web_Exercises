<?php
require_once('../parks_config.php');
require_once('../db_connect.php');
require '../Input.php';

if(Input::has('page')) {
    $page = Input::get('page');
} else {
    $page = 1;
}

$items_per_page = 4;

$totalParks = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
$lastPage = ceil($totalParks / $items_per_page);

if ($page > $lastPage) {
    $page = $lastPage;
}
if ($page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $items_per_page;
$sql = 'SELECT * FROM national_parks LIMIT ' . $offset . ',' . $items_per_page;

$parks = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$pageUp = $page + 1;
$pageDown = $page - 1;

?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            background-image: url(img/swirl_pattern.png);
        }
        .table {
            background-color: white;
        }
        h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: 4em;
            text-align: center;
        }

    </style>
</head>
<body>
    <main class="container">
        <h1>National Parks</h1>
        <table class="table">
            <tr class="active">
                <td>Name</td>  
                <td>Location</td>
                <td>Date Established</td>
                <td>Area (acres)</td>
            </tr>
            <? foreach ($parks as $park):?>
                <tr>
                    <td><?= $park['name']; ?></td>  
                    <td><?= $park['location']; ?></td>
                    <td><?= $park['date_established']; ?></td>
                    <td><?= $park['area_in_acres']; ?></td>   
                </tr>
            <? endforeach; ?>
        </table>

    <? if ($totalParks >= $items_per_page) { ?>        
        <? if ($page > 1) { ?>
            <a href="national_parks.php?page=<?= $pageDown; ?>" class="btn btn-default">Previous</a>
        <? } ?>

        <? if ($page < $lastPage) { ?>
            <a href="national_parks.php?page=<?= $pageUp; ?>" class="btn btn-default">Next</a>
        <? } ?>
    <? } ?>
</main>
</body>
</html>