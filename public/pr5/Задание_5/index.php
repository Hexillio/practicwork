<?php

// 1. Подключаем файлы и сразу сохраняем $content в разные переменные
include 'teams.php';
$teams = $content;

include 'albums.php';
$albums = $content;

include 'tracks.php'; // Обрати внимание на название файла
$tracks = $content;

// Собираем "карту" данных
$allData = [
    'teams'  => $teams,
    'albums' => $albums,
    'tracks' => $tracks
];

// 2. Получаем параметр из URL
$search = $_GET['search'] ?? '';

if (!$search) {
    die("Параметр search не передан. Пример: ?search=albums::5");
}

// 3. Разбираем строку (например, teams::3)
$parts = explode('::', $search);

if (count($parts) !== 2) {
    die("Некорректный формат. Ожидается сущность::id");
}

$entity = $parts[0];
$id = $parts[1];

// 4. Проверяем, существует ли такая сущность в нашей карте
if (!isset($allData[$entity])) {
    die("Ошибка: Сущность '{$entity}' не найдена.");
}

// 5. Ищем нужную запись в выбранном массиве
$found = null;
foreach ($allData[$entity] as $item) {
    if ($item['id'] == $id) {
        $found = $item;
        break;
    }
}

// 6. Вывод результата
if ($found) {
    echo "<h3>Результат из категории " . htmlspecialchars($entity) . ":</h3>";
    echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
    foreach ($found as $key => $value) {
        echo "<tr>";
        echo "<td><strong>" . htmlspecialchars($key) . "</strong></td>";
        echo "<td>" . ($value ? htmlspecialchars($value) : "<i>null</i>") . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Запись с ID {$id} в сущности '{$entity}' не найдена.";
}
?>