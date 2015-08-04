<?php  

require_once('parks_config.php');
require('db_connect.php');

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

$dropSql = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($dropSql);

$createSql = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres DOUBLE NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($createSql);

?>