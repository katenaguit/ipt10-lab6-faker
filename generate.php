<?php

require_once 'FileUtility.php';
require_once 'Random.php';

$random = new Random();
$people = $random->generatePeople(300);

$filename = 'persons.csv';
$file = fopen($filename, 'w');

$header = array_keys($people[0]);
fputcsv($file, $header);

foreach ($people as $person) {
    fputcsv($file, $person);
}

fclose($file);

echo "Data generated and saved to $filename.";
?>
