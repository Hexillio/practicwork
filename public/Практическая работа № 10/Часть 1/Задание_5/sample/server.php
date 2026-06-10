<?php
// server.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Собираем критерии поиска из формы в ассоциативный массив
    $searchCriteria = [
        'user'  => isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : 'Аноним',
        'brand' => isset($_POST['brand']) ? $_POST['brand'] : 'Не выбран',
        'os'    => isset($_POST['os']) ? $_POST['os'] : 'Не выбрана',
        'ssd'   => isset($_POST['ssd']) ? $_POST['ssd'] : 'Не указан'
    ];

    // Преобразуем критерии в JSON-представление с поддержкой кириллицы
    $jsonCriteria = json_encode($searchCriteria, JSON_UNESCAPED_UNICODE);

    // Кодируем JSON-строку для безопасной передачи через GET-параметр ссылки
    $urlEncodedJson = urlencode($jsonCriteria);

    // Формируем ссылку на скрипт поиска db.php с параметром query
    $searchLink = "db.php?query=" . $urlEncodedJson;

    // Выводим интерфейс сервера
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Сервер обработки критериев</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 30px; line-height: 1.6;'>";
    
    echo "<h1>Шаг 2: Условный сервер (server.php)</h1>";
    echo "<p>Данные успешно приняты и упакованы в JSON-формат.</p>";
    
    echo "<h3>Сформированная JSON-строка:</h3>";
    echo "<pre style='background: #f4f4f4; padding: 15px; border: 1px solid #ccc; display: inline-block;'>";
    echo htmlspecialchars($jsonCriteria);
    echo "</pre><p>";

    // Генерируем ссылку, к атрибуту href которой прикреплен наш JSON
    echo "<a href='" . $searchLink . "' style='display: inline-block; padding: 12px 24px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;'>";
    echo "Перейти к поиску информации в БД (db.php)";
    echo "</a>";
    
    echo "</body>";
    echo "</html>";

} else {
    echo "Ошибка: Сервер ожидает передачу критериев методом POST.";
}
