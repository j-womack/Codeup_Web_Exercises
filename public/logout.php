<?php
session_start();

require_once '../Auth.php';

Auth::logout();
header("Location: login.php");
exit();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Logging Out...</title>
</head>
<body>

</body>
</html>