<?php
// server.php

// Проверяем, что данные пришли методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // 1. Принимаем данные формы и очищаем их
    $surname = isset($_POST['surname']) ? htmlspecialchars(trim($_POST['surname'])) : '';
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $fontname = isset($_POST['fontname']) ? htmlspecialchars(trim($_POST['fontname'])) : '';
    $dolzhnost = isset($_POST['dolzhnost']) ? htmlspecialchars(trim($_POST['dolzhnost'])) : '';
    $education_level = isset($_POST['education_level']) ? htmlspecialchars($_POST['education_level']) : '';
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $total_experience = isset($_POST['total_experience']) ? (float)$_POST['total_experience'] : 0.0;
    $college_experience = isset($_POST['college_experience']) ? (float)$_POST['college_experience'] : 0.0;

    // 2. "Вручную" конструируем JSON-строку
    // Используем экранирование кавычек и спецсимволов для корректного JSON-формата
    $jsonString = '{' . "\n" .
        '  "surname": "' . addslashes($surname) . '",' . "\n" .
        '  "name": "' . addslashes($name) . '",' . "\n" .
        '  "fontname": "' . addslashes($fontname) . '",' . "\n" .
        '  "dolzhnost": "' . addslashes($dolzhnost) . '",' . "\n" .
        '  "education_level": "' . addslashes($education_level) . '",' . "\n" .
        '  "category": "' . addslashes($category) . '",' . "\n" .
        '  "total_experience": ' . $total_experience . ',' . "\n" .
        '  "college_experience": ' . $college_experience . "\n" .
        '}';

    // Подготавливаем HTML-страницу для вывода результата
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Обработка данных формы</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 20px; line-height: 1.6;'>";
    
    echo "<h1>Результат работы условного сервера</h1>";

    // 3. Выводим созданную вручную строку JSON в браузер
    echo "<h3>1. Строка в формате JSON (создана вручную):</h3>";
    echo "<pre style='background: #f4f4f4; padding: 15px; border: 1px solid #ccc; color: #d63384; font-weight: bold;'>";
    echo htmlspecialchars($jsonString);
    echo "</pre>";

    // 4. Декодируем созданную JSON-представление обратно в массив PHP
    $decodedArray = json_decode($jsonString, true);

    // 5. Выводим полученный массив в браузер
    echo "<h3>2. Результат декодирования JSON в массив PHP:</h3>";
    echo "<pre style='background: #e9ecef; padding: 15px; border: 1px solid #999; color: #111;'>";
    print_r($decodedArray);
    echo "</pre>";

    echo "<p><a href='index.html'>◀ Вернуться к форме</a></p>";
    echo "</body>";
    echo "</html>";

} else {
    echo "Ошибка: Данные должны передаваться из формы методом POST.";
}
