<?php
// server.php

// Проверяем, что данные пришли методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Получаем значение способа отображения из массива GET
    $view = isset($_GET['view']) ? $_GET['view'] : 'dump';
    
    // Собираем все пришедшие поля формы в один массив
    $formData = [
        'name'     => isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '',
        'alias'    => isset($_POST['alias']) ? htmlspecialchars(trim($_POST['alias'])) : '',
        'country'  => isset($_POST['country']) ? htmlspecialchars(trim($_POST['country'])) : '',
        'date'     => isset($_POST['date']) ? htmlspecialchars(trim($_POST['date'])) : '',
        'style'    => isset($_POST['style']) ? htmlspecialchars(trim($_POST['style'])) : '',
        'path'     => isset($_POST['path']) ? htmlspecialchars(trim($_POST['path'])) : '',
        'content'  => isset($_POST['content']) ? htmlspecialchars(trim($_POST['content'])) : '',
        'note'     => isset($_POST['note']) ? htmlspecialchars(trim($_POST['note'])) : ''
    ];

    // Вывод структуры HTML в браузер
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Ответ условного сервера</title></head>";
    echo "<body style='font-family: Arial, sans-serif; margin: 20px; line-height: 1.6;'>";
    echo "<h1>Результат работы условного сервера</h1>";
    echo "<p>Режим отображения данных: <strong>$view</strong></p>";

    // Логика переключения формата вывода
    if ($view === 'dump') {
        
        echo "<h3>Данные формы в виде объекта PHP (stdClass):</h3>";
        
        // Приведение типа (object) автоматически превращает ассоциативный массив в объект stdClass
        $phpObject = (object)$formData;
        
        echo "<pre style='background: #f4f4f4; padding: 15px; border: 1px solid #ccc; border-radius: 5px;'>";
        var_dump($phpObject);
        echo "</pre>";

    } elseif ($view === 'json') {
        
        echo "<h3>Данные формы в виде объекта JSON:</h3>";
        
        // Кодируем массив в JSON-объект с красивыми отступами и поддержкой кириллицы
        $jsonObject = json_encode($formData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
        echo "<pre style='background: #e9ecef; padding: 15px; border: 1px solid #999; color: #b02a37; font-weight: bold;'>";
        echo htmlspecialchars($jsonObject);
        echo "</pre>";

    } else {
        echo "<p style='color: red;'>Ошибка: Передан неподдерживаемый параметр отображения.</p>";
    }

    echo "<p><a href='index.php?view=$view'>◀ Вернуться к заполнению формы</a></p>";
    echo "</body>";
    echo "</html>";

} else {
    echo "Ошибка: Сервер ожидает данные методом POST. Пожалуйста, отправьте форму.";
}
