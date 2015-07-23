<?php
session_start();

require 'functions.php';

if (isset($_SESSION['LOGGED_IN_USER'])) {
    header("Location: authorized.php");
    exit();
}

function pageController(){
    $data = [];
    $data['location'] = 'login.php';

    if (!empty($_POST)){
        if (inputGet('user') == 'guest' && inputGet('password') == 'password') {
            $_SESSION['LOGGED_IN_USER'] = inputGet('user');
            header("Location: authorized.php");
            exit();
        } 
    } 
    return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>

<style type="text/css">
    body {
        background-image: url(img/swirl_pattern.png);
        font-family: 'Libre Baskerville', serif;
        text-align: center;
    }
</style>

</head>
<body>
    <main class="container">
        <h1>Login</h1>

        <div class="form-group">
        <form method="POST" action="login.php">
            
            <input type="text" class="form-control" name="user" placeholder="Username"><br>
            
            <input type="password" class="form-control" name="password" placeholder="Password"><br>
            <input type="submit" class="btn btn-default">
        </form>
        </div>
    </main>
</body>
</html>