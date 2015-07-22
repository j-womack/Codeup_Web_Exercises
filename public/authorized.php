<?php

session_start();

if (!isset($_SESSION['LOGGED_IN_USER'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>
</head>
<body>
    <h1>Authorized</h1>
    <a href="logout.php">Log Out</a>

</body>
</html>