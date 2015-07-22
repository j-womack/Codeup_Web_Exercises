<?php

var_dump($_POST);

session_start();
var_dump(session_id());
var_dump($_SESSION);

if (isset($_SESSION['LOGGED_IN_USER'])) {
    header("Location: authorized.php");
    exit();
}

function pageController(){
    $data = [];
    $data['location'] = 'login.php';

    if (!empty($_POST)){
        if ($_POST['user'] == 'guest' && $_POST['password'] == 'password') {
            $_SESSION['LOGGED_IN_USER'] = $_POST['user'];
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
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="login.php">
        <label>User</label>
        <input type="text" name="user"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>

</body>
</html>