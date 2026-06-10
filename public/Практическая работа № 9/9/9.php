<?php
$teamContent = file_get_contents('team.json');
$jsonStart = strpos($teamContent, '[');
$jsonEnd = strrpos($teamContent, ']');
$jsonStr = substr($teamContent, $jsonStart, $jsonEnd - $jsonStart + 1);

$teams = json_decode($jsonStr, true);

$newTeam = [
    "id_team" => "7",
    "name" => "Пикник",
    "alias" => "picnic",
    "country" => "Россия",
    "content" => "Группа образована в сентябре 1978 года в Ленинграде из студентов Ленинградского политехнического университета (Политеха), игравших в любительской группе «Орион»",
    "date" => "1978",
    "style" => "рок, арт, готик, инди",
    "path" => "/assets/teams/picnic.jpg",
    "note" => "Отправной точкой нынешнего «Пикника» сами участники группы считают приход в группу Эдмунда Шклярского в 1981 году, либо год записи первого альбома — 1982 год"
];

$teams[] = $newTeam;

echo "<pre>";
print_r($teams);
echo "</pre>";
?>