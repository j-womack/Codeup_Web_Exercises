<?php
var_dump($_GET);

function pageController(){
    $data = [];

    if(isset($_GET['i'])) {
        if ($_GET['direction'] == 'up') {
            $_GET['i']++;
            $data['i'] = $_GET['i'];
        } elseif ($_GET['direction'] == 'down') {
            $_GET['i']--;
            $data['i'] = $_GET['i'];
        }
    } else {
        $data['i'] = 0;
    }
        return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title>Counter</title>
</head>
<body>
    <h1>Counter: <?= $i; ?></h1>
    <a href="?direction=up&i=<?= $i; ?>">UP</a>
    <a href="?direction=down&i=<?= $i; ?>">DOWN</a>

</body>
</html>