<?php  

require_once('parks_config.php');
require_once('db_connect.php');

$query = 'TRUNCATE national_parks';
$dbc->exec($query);

$parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => 47389.67],
    ['name' => 'American Samoa', 'location' => 'American Samoa', 'date_established' => '1988-10-31', 'area_in_acres' => 9000.00],
    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => 76518.98],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => '1980-06-28', 'area_in_acres' => 172924.07],
    ['name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date_established' => '1999-10-21', 'area_in_acres' => 32950.03],
    ['name' => 'Bryce Canyon', 'location' => 'Utah', 'date_established' => '1928-02-25', 'area_in_acres' => 35835.08],
    ['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => 337597.83],
    ['name' => 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971-12-18', 'area_in_acres' => 241904.26]




// Capitol Reef    Cassidy Arch  Utah
// 38.20°N 111.17°W    December 18, 1971   241,904.26 acres (979.0 km2)    786,514
// Carlsbad Caverns   New Mexico
// 32.17°N 104.44°W    May 14, 1930    46,766.45 acres (189.3 km2) 397,309 
// Channel Islands   California
// 34.01°N 119.42°W    March 5, 1980   249,561.00 acres (1,009.9 km2)  342,161 
// Congaree     South Carolina
// 33.78°N 80.78°W November 10, 2003   26,545.86 acres (107.4 km2) 120,122 
// Crater Lake   Oregon
// 42.94°N 122.1°W May 22, 1902    183,224.05 acres (741.5 km2)    535,508 
// Cuyahoga Valley   Ohio
// 41.24°N 81.55°W October 11, 2000    32,860.73 acres (133.0 km2) 2,189,849   
// Death Valley    California, Nevada
// 36.24°N 116.82°W    October 31, 1994    3,372,401.96 acres (13,647.6 km2)   1,101,312 
// Denali   Alaska
// 63.33°N 150.50°W    February 26, 1917   4,740,911.72 acres (19,185.8 km2)   531,315 
// Dry Tortugas    Florida
// 24.63°N 82.87°W October 26, 1992    64,701.22 acres (261.8 km2) 64,865  
// Everglades      Florida
// 25.32°N 80.93°W May 30, 1934    1,508,537.90 acres (6,104.8 km2)    1,110,901  
// Gates of the Arctic   Alaska
// 67.78°N 153.30°W    December 2, 1980    7,523,897.74 acres (30,448.1 km2)   12,669 
// Glacier    Montana
// 48.80°N 114.00°W    May 11, 1910    1,013,572.41 acres (4,101.8 km2)    2,338,528  
// Glacier Bay  Alaska
// 58.50°N 137.00°W    December 2, 1980    3,224,840.31 acres (13,050.5 km2)   500,727 
// Grand Canyon       Arizona
// 36.06°N 112.14°W    February 26, 1919   1,217,403.32 acres (4,926.7 km2)    4,756,771   
// Grand Teton    Wyoming
// 43.73°N 110.80°W    February 26, 1929   309,994.66 acres (1,254.5 km2)  2,791,392  
// Great Basin    Nevada
// 38.98°N 114.30°W    October 27, 1986    77,180.00 acres (312.3 km2) 107,526
// Great Sand Dunes    Colorado
// 37.73°N 105.51°W    September 13, 2004  42,983.74 acres (173.9 km2) 271,774 
// Great Smoky Mountains     North Carolina, Tennessee
// 35.68°N 83.53°W June 15, 1934   521,490.13 acres (2,110.4 km2)  10,099,276  
// Guadalupe Mountains  Texas
// 31.92°N 104.87°W    October 15, 1966    86,415.97 acres (349.7 km2) 166,868 
// Haleakalā       Hawaii
// 20.72°N 156.17°W    August 1, 1916  29,093.67 acres (117.7 km2) 1,142,040  
// Hawaii Volcanoes    Hawaii
// 19.38°N 155.20°W    August 1, 1916  323,431.38 acres (1,308.9 km2)  1,693,005  
// Hot Springs    Arkansas
// 34.51°N 93.05°W March 4, 1921   5,549.75 acres (22.5 km2)   1,424,484  
// Isle Royale  Michigan
// 48.10°N 88.55°W April 3, 1940   571,790.11 acres (2,314.0 km2)  14,560 







];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks(name, location, date_established, area_in_acres)
                VALUES ('{$park['name']}', '{$park['location']}', 
                '{$park['date_established']}', '{$park['area_in_acres']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


?>