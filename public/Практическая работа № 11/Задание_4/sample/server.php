<?php
// Переменная для хранения текста ошибки
$error = null;

// Проверяем, что запрос отправлен методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Проверяем, был ли загружен файл и нет ли ошибок загрузки на сервер
    if (!isset($_FILES['userfile']) || $_FILES['userfile']['error'] !== UPLOAD_ERR_OK) {
        // Если ошибка в загрузке, определяем причину
        $errorCode = isset($_FILES['userfile']) ? $_FILES['userfile']['error'] : UPLOAD_ERR_NO_FILE;
        
        switch ($errorCode) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $error = "Ошибка: Размер файла превышает допустимый лимит.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $error = "Ошибка: Файл не был выбран.";
                break;
            default:
                $error = "Ошибка при загрузке файла на сервер.";
                break;
        }
    } else {
        // Путь к временному файлу на сервере
        $tmpPath = $_FILES['userfile']['tmp_name'];

        // 1. Проверка: является ли файл изображением и соответствует ли типам
        // Функция exif_imagetype() возвращает константу типа или false, если это не картинка
        if (!function_exists('exif_imagetype')) {
            $error = "Ошибка сервера: Расширение EXIF не включено.";
        } else {
            $imageType = exif_imagetype($tmpPath);

            if ($imageType === false) {
                // ПУНКТ 1: Файл вообще не является изображением
                $error = "Ошибка: Загруженный файл не является изображением.";
            } else {
                // ПУНКТ 2: Проверка на соответствие разрешенным константам
                $allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP];
                
                if (!in_array($imageType, $allowedTypes)) {
                    $error = "Ошибка: Недопустимый тип изображения. Разрешены только JPEG, PNG и BMP.";
                }
            }
        }
    }

    // ВЫВОД РЕЗУЛЬТАТОВ ПРОВЕРКИ
    echo "<!DOCTYPE html>";
    echo "<html lang='ru'>";
    echo "<head><meta charset='UTF-8'><title>Результат проверки файла</title></head>";
    echo "<body>";

    if ($error) {
        // Проверка не пройдена
        echo "<h2 style='color: red;'>Файл не принят</h2>";
        echo "<p>" . htmlspecialchars($error) . "</p>";
        echo "<p><a href='javascript:history.back()'>Попробовать еще раз</a></p>";
    } else {
        // Все проверки успешно пройдены
        echo "<h2 style='color: green;'>Файл успешно проверен!</h2>";
        echo "<p>Имя файла: " . htmlspecialchars($_FILES['userfile']['name']) . "</p>";
        echo "<p>Тип файла соответствует требованиям (JPEG/PNG/BMP).</p>";
        
        // Здесь можно разместить код для перемещения файла из временной папки:
        // move_uploaded_file($tmpPath, "uploads/" . $_FILES['userfile']['name']);
    }

    echo "</body>";
    echo "</html>";

} else {
    echo "Сценарий ожидает POST-запрос с файлом.";
}
?>
