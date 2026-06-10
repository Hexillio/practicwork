<?php
// db.php

// Проверяем, передан ли GET-параметр query с JSON-строкой
if (isset($_GET['query'])) {
    
    // Получаем сырую строку (PHP автоматически декодирует urlencode при обращении к $_GET)
    $receivedJson = $_GET['query'];
    
    // Декодируем JSON-представление обратно в ассоциативный массив PHP
    $decodedData = json_decode($receivedJson, true);

    // Выводим результат в браузер
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Сценарий поиска в БД</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 30px; line-height: 1.6;'>";
    
    echo "<h1>Шаг 3: Сценарий поиска информации (db.php)</h1>";
    echo "<p>JSON успешно принят из строки запроса ссылки и декодирован.</p>";
    
    echo "<h3>Вывод полученных данных в виде переменной PHP (структура массива):</h3>";
    echo "<pre style='background: #e9ecef; padding: 15px; border: 1px solid #999; border-radius: 5px; color: #111;'>";
    // Демонстрируем данные как полноценную переменную PHP
    print_r($decodedData);
    echo "</pre>";

    echo "<hr>";
    echo "<p><strong>Пользователь:</strong> " . htmlspecialchars($decodedData['user']) . "<br>";
    echo "<strong>Запрос к БД:</strong> Искать ноутбук бренда <em>" . htmlspecialchars($decodedData['brand']) . "</em> ";
    echo "с операционной системой <em>" . htmlspecialchars($decodedData['os']) . "</em> ";
    echo "и объемом SSD <em>" . htmlspecialchars($decodedData['ssd']) . " ГБ</em>.</p>";

    echo "<p><a href='index.php'>◀ Вернуться к началу (к форме)</a></p>";
    echo "</body>";
    echo "</html>";

} else {
    echo "Ошибка: Критерии поиска не переданы. Пожалуйста, отправьте форму со страницы index.php.";
}
