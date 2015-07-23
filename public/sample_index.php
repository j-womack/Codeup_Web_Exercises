<?php

require_once 'functions.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sample Index Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style type="text/css">
        .navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .navItem {
            display: inline;
            width: 25%;
        }
        .footer {
            position: absolute;
            bottom: 0;
            height: 60px;
            width: 100%;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>
<?php include 'header.php'; ?>

    <main class='container'>
        <h1>Here is my Sample Index page.</h1>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </main>

<?php include 'footer.php'; ?>

</body>
</html>