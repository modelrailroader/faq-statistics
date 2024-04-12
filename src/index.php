<?php
include_once(__DIR__.'/vendor/autoload.php');
include_once('constants.php');

use A1phanumeric\DBPDO;

$dbclient = new DBPDO($dbhost, $dbname, $dbuser, $dbpassword);

$source = filter_input(INPUT_GET, 'source', FILTER_SANITIZE_SPECIAL_CHARS);

$names = $dbclient->fetch("SELECT name FROM statistics");

if (in_array($source, $names)) {
    $query = sprintf(
        "SELECT views FROM statistics WHERE name='%s'",
        $source
    );
    $currentViews = $dbclient->fetch($query);

    $updateQuery = sprintf(
        "UPDATE statistics SET views=%d WHERE name='%s'",
        (int)$currentViews['views'] + 1,
        $source
    );
    $dbclient->execute($updateQuery);
}

header('Location: https://melle-gymnasium.de/ipad-faq');
exit();