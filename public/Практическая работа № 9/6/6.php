<?php
$assoc_array = [
    "name" => "Мастер и Маргарита",
    "author" => "М.Булгаков",
    "year" => 1940,
    "genre" => "Мистика",
    "bestseller" => true
];

$jsonStr = '{"name":"Мастер и Маргарита","author":"М.Булгаков","year":1940,"genre":"Мистика","bestseller":true}';

$decoded = json_decode($jsonStr, true); // true = ассоциативный массив

echo "<pre>";
print_r($decoded);
echo "</pre>";
?>