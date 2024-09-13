<?php

require_once 'FileUtility.php';

$filename = 'persons.csv';
$data = FileUtility::openFile($filename);

$lines = explode("\n", trim($data));
$header = str_getcsv(array_shift($lines));
$rows = array_map('str_getcsv', $lines);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persons Data</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Persons Data</h1>
    <table>
        <thead>
            <tr>';
foreach ($header as $col) {
    echo "<th>{$col}</th>";
}
echo '    </tr>
        </thead>
        <tbody>';
foreach ($rows as $row) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo "<td>{$cell}</td>";
    }
    echo '</tr>';
}
echo '    </tbody>
    </table>
</body>
</html>';
?>
