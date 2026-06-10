<?php
$team = file_get_contents('team.txt');

$jsonStart = strpos($team, '[');
$jsonEnd = strrpos($team, ']');
$jsonStr = substr($team, $jsonStart, $jsonEnd - $jsonStart + 1);

$decoded = json_decode($jsonStr); // без true = объекты

echo "<pre>";
print_r($decoded);
echo "</pre>";
?>