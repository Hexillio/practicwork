<?php
// server.php

// Проверяем, что запрос пришел методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Получаем и обрабатываем текстовые поля
    $surname = isset($_POST['surname']) ? htmlspecialchars(trim($_POST['surname'])) : '';
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $fontname = isset($_POST['fontname']) ? htmlspecialchars(trim($_POST['fontname'])) : '';
    $dolzhnost = isset($_POST['dolzhnost']) ? htmlspecialchars(trim($_POST['dolzhnost'])) : '';
    
    // Получаем выбранные параметры из списков и radio-кнопок
    $education_level = isset($_POST['education_level']) ? htmlspecialchars($_POST['education_level']) : 'Не указано';
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : 'Не установлена';
    
    // Получаем числовые значения стажа
    $total_experience = isset($_POST['total_experience']) ? (float)$_POST['total_experience'] : 0.0;
    $college_experience = isset($_POST['college_experience']) ? (float)$_POST['college_experience'] : 0.0;

    // Вывод результата в браузер
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Результат работы сервера</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 20px; line-height: 1.6;'>";
    
    echo "<h1>Результат работы условного сервера</h1>";
    echo "<h2>Полученные данные сотрудника:</h2>";
    
    echo "<ul>";
    echo "<li><strong>ФИО:</strong> $surname $name $fontname</li>";
    echo "<li><strong>Должность:</strong> $dolzhnost</li>";
    echo "<li><strong>Уровень образования:</strong> $education_level</li>";
    echo "<li><strong>Категория:</strong> $category</li>";
    echo "<li><strong>Общий стаж:</strong> $total_experience лет</li>";
    echo "<li><strong>Стаж в техникуме:</strong> $college_experience лет</li>";
    echo "</ul>";
    
    // Вывод структуры массива для сверки с примером из задания
    echo "<h3>Структура полученного массива \$_POST:</h3>";
    echo "<pre style='background: #f4f4f4; padding: 15px; border: 1px solid #ccc; border-radius: 5px; display: inline-block;'>";
    print_r($_POST);
    echo "</pre>";
    
    echo "<p><a href='index.html'>◀ Вернуться к форме</a></p>";
    echo "</body>";
    echo "</html>";

} else {
    echo "Ошибка: Данные должны передаваться из формы методом POST.";
}
