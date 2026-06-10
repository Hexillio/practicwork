<?php
$array = ["Мастер и Маргарита", "М.Булгаков", 1940, "Мистика", true];

$jsonStr = '["Мастер и Маргарита", "М.Булгаков", 1940, "Мистика", true]';

$decoded = json_decode($jsonStr);

echo "<pre>";
print_r($decoded);
echo "</pre>";
?>