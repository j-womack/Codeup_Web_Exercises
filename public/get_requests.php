<?php

var_dump($_GET);


?>
<html>
<head>
    <title>GET Requests</title>
</head>
<body>
    <a href="?name=Josh">My Name</a>
    <form method="GET" action="https://duckduckgo.com/">
        <input type="text" name="q" value="" placeholder="Search DuckDuckGo">
        <button type="submit">Go!</button>
    </form>

</body>
</html>