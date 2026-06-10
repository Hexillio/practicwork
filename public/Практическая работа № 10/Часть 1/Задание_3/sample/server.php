<?php
// server.php

// Проверяем метод отправки данных
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // 1. Формируем JSON-строку "вручную" с помощью цикла foreach
    $jsonParts = [];
    
    foreach ($_POST as $key => $value) {
        // Очищаем ключ и значение от опасных символов
        $cleanKey = htmlspecialchars(trim($key));
        $cleanValue = htmlspecialchars(trim($value));
        
        // Проверяем, является ли значение числом (целым или с плавающей точкой)
        if (is_numeric($cleanValue)) {
            // Числа в JSON записываются без кавычек
            $jsonParts[] = '"' . addslashes($cleanKey) . '": ' . $cleanValue;
        } else {
            // Строки оборачиваются в двойные кавычки
            $jsonParts[] = '"' . addslashes($cleanKey) . '": "' . addslashes($cleanValue) . '"';
        }
    }
    
    // Объединяем элементы через запятую и оборачиваем в фигурные скобки
    $jsonString = "{\n  " . implode(",\n  ", $jsonParts) . "\n}";

    // Подготавливаем HTML-страницу вывода
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Обработка формы циклом</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 20px; line-height: 1.6;'>";
    
    echo "<h1>Результат работы условного сервера</h1>";

    // 2. Выводим строку JSON, полученную в результате цикла
    echo "<h3>JSON-строка (сформирована через цикл):</h3>";
    echo "<pre style='background: #f4f4f4; padding: 15px; border: 1px solid #ccc; color: #d63384; font-weight: bold;'>";
    echo htmlspecialchars($jsonString);
    echo "</pre>";

    // 3. Декодируем созданную JSON-строку в массив PHP
    $decodedArray = json_decode($jsonString, true);

    // 4. Выводим декодированный массив в браузер
    echo "<h3>Декодированный массив PHP (print_r):</h3>";
    echo "<pre style='background: #e9ecef; padding: 15px; border: 1px solid #999; color: #111;'>";
    print_r($decodedArray);
    echo "</pre>";

    echo "<p><a href='index.html'>◀ Вернуться к форме</a></p>";
    echo "</body>";
    echo "</html>";

} else {
    echo "Ошибка: Данные должны передаваться из формы методом POST.";
}
