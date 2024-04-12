<?php
include_once('../vendor/autoload.php');
include_once('../constants.php');

use A1phanumeric\DBPDO;

$dbclient = new DBPDO($dbhost, $dbname, $dbuser, $dbpassword);

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

$data = $dbclient->fetchAll("SELECT description, views FROM statistics");
$descriptions = [];
$views = [];
foreach ($data as $item) {
    $descriptions[] = $item['description'];
    $views[] = $item['views'];
}

$jsonData = array(
    'descriptions' => $descriptions,
    'views' => $views
);
header('Content-Type: application/json');
echo(json_encode($jsonData));
