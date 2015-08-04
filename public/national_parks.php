<?php

// var_dump($_POST);

require_once('../parks_config.php');
require_once('../db_connect.php');
require_once('../Input.php');

function validateDate($date)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') == $date;
}

$states = array(
    "Alabama" => "Alabama",
    "Alaska" => "Alaska",
    "Arizona" => "Arizona",
    "Arkansas" => "Arkansas",
    "California" => "California",
    "Colorado" => "Colorado",
    "Connecticut" => "Connecticut",
    "Delaware" => "Delaware",
    "District of Columbia" => "District of Columbia",
    "Florida" => "Florida",
    "Georgia" => "Georgia",
    "Hawaii" => "Hawaii",
    "Idaho" => "Idaho",
    "Illinois" => "Illinois",
    "Indiana" => "Indiana",
    "Iowa" => "Iowa",
    "Kansas" => "Kansas",
    "Kentucky" => "Kentucky",
    "Louisiana" => "Louisiana",
    "Maine" => "Maine",
    "Maryland" => "Maryland",
    "Massachusetts" => "Massachusetts",
    "Michigan" => "Michigan",
    "Minnesota" => "Minnesota",
    "Mississippi" => "Mississippi",
    "Missouri" => "Missouri",
    "Montana" => "Montana",
    "Nebraska" => "Nebraska",
    "Nevada" => "Nevada",
    "New Hampshire" => "New Hampshire",
    "New Jersey" => "New Jersey",
    "New Mexico" => "New Mexico",
    "New York" => "New York",
    "North Carolina" => "North Carolina",
    "North Dakota" => "North Dakota",
    "Ohio" => "Ohio",
    "Oklahoma" => "Oklahoma",
    "Oregon" => "Oregon",
    "Pennsylvania" => "Pennsylvania",
    "Rhode Island" => "Rhode Island",
    "South Carolina" => "South Carolina",
    "South Dakota" => "South Dakota",
    "Tennessee" => "Tennessee",
    "Texas" => "Texas",
    "Utah" => "Utah",
    "Vermont" => "Vermont",
    "Virginia" => "Virginia",
    "Washington" => "Washington",
    "West Virginia" => "West Virginia",
    "Wisconsin" => "Wisconsin",
    "Wyoming" => "Wyoming"
);


if(Input::has('page')) {
    $page = Input::get('page');
} else {
    $page = 1;
}

if(Input::get('name') != '' && Input::get('location') != '' && Input::get('date_established') != '' && Input::get('area_in_acres') != '' && Input::get('description') != '') {
    if(validateDate(Input::get('date_established'))) {
        if(is_numeric(Input::get('area_in_acres'))) {
            $name = Input::get('name');
            $location = Input::get('location');
            $date_established = Input::get('date_established');
            $area_in_acres = Input::get('area_in_acres');
            $description = Input::get('description'); 

            $addStmt = $dbc->prepare('INSERT INTO national_parks(name, location, date_established, area_in_acres, description)
            VALUES (:name, :location, :date_established, :area_in_acres, :description)');

            $addStmt->bindValue(':name', $name, PDO::PARAM_STR);
            $addStmt->bindValue(':location', $location, PDO::PARAM_STR);
            $addStmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
            $addStmt->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
            $addStmt->bindValue(':description', $description, PDO::PARAM_STR);

            $addStmt->execute();
        }
    }
}

$items_per_page = 5;

$totalParks = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
$lastPage = ceil($totalParks / $items_per_page);

if ($page > $lastPage) {
    $page = $lastPage;
}
if ($page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $items_per_page;

$stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :offset , :items_per_page');
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':items_per_page', $items_per_page, PDO::PARAM_INT);
$stmt->execute();

$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pageUp = $page + 1;
$pageDown = $page - 1;

?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
    <style type="text/css">
        body {
            font-family: 'Hind', sans-serif;
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
        label {
            font-family: 'Libre Baskerville', serif;
            font-size: 1.5em;
        }
        .pager {
            font-family: 'Libre Baskerville', serif;
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
                <td>Description</td>
            </tr>
            <? foreach ($parks as $park):?>
                <tr>
                    <td><?= $park['name']; ?></td>  
                    <td><?= $park['location']; ?></td>
                    <td><?= date("m/d/Y", strtotime($park['date_established'])); ?></td>
                    <td><?= number_format($park['area_in_acres'], 2); ?></td>  
                    <td><?= $park['description']; ?></td>  
                </tr>
            <? endforeach; ?>
        </table>


        <nav>
            <ul class="pager">
                <? if ($totalParks >= $items_per_page) : ?>        
                    <? if ($page > 1) : ?>
                        <li class="previous"><a href="national_parks.php?page=1" class="btn btn-default">First Page</a></li>
                        <li class="previous"><a href="national_parks.php?page=<?= $pageDown; ?>" class="btn btn-default">Previous</a></li>
                    <? endif; ?>
                    <? if ($page < $lastPage) : ?>
                        <li class="next"><a href="national_parks.php?page=<?= $lastPage; ?>" class="btn btn-default">Last Page</a></li>
                        <li class="next"><a href="national_parks.php?page=<?= $pageUp; ?>" class="btn btn-default">Next</a></li>
                    <? endif; ?>
                <? endif; ?>
            </ul>
        </nav>

               
        <br>
        <form method="post">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
            
            <label for="location">Location</label>
            <select class="form-control" name="location" id="location">
                <? foreach ($states as $state) : ?>
                    <option value="<?= $state ?>"><?= $state ?></option>
                <? endforeach; ?>
            </select><br>
            
            <label for="date_established">Date Established</label>
            <input type="text" class="form-control" name="date_established" id="date_established" placeholder="YYYY-MM-DD"><br>
            
            <label for="area_in_acres">Area (acres)</label>
            <input type="text" class="form-control" name="area_in_acres" id="area_in_acres" placeholder="Area (acres)"><br>
            
            <label for="description">Description</label>
            <textarea type="text" rows="5" class="form-control" name="description" id="description" placeholder="Description"></textarea><br>
            
            <button type="submit" class="btn btn-default">Submit</button>
        </form>


</main>
</body>
</html>