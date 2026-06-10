<?php
// server.php

// Проверяем, пришли ли данные в параметре 'data'
if (isset($_GET['data'])) {
    // Получаем сырые данные из URL (PHP автоматически делает urldecode)
    $rawData = $_GET['data'];
    
    // 4. Декодируем полученные JSON данные обратно в массив
    $decodedData = json_decode($rawData, true);
    
    // 5. Выводим результат работы в браузер
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Серверный ответ</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 20px;'>";
    echo "<h1>Результат работы условного сервера</h1>";
    echo "<h3>Декодированные данные (структура массива):</h3>";
    
    // Форматированный вывод структуры массива (как в print_r)
    echo "<pre style='background: #f4f4f4; padding: 15px; border: 1px solid #ccc; border-radius: 5px;'>";
    print_r($decodedData);
    echo "</pre>";
    
    echo "</body>";
    echo "</html>";
} else {
    echo "Данные не были переданы. Пожалуйста, перейдите по ссылке со страницы клиента.";
}
