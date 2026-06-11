<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>
	<hr>
	<h2>Загрузка файлов</h2>

	<?php
		$_ERROR = []; // массив ошибок

		// Работаем только в том случае, если форма была отправлена
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// 1. Проверяем поле логин на соответствие требованиям
			$login = isset($_POST['login']) ? trim($_POST['login']) : '';

			if ($login === '') {
				$_ERROR[] = "Поле логина не должно быть пустым.";
			} else {
				// Санитизация
				$login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
				
				// Валидация по правилу [a-z0-9]{5,10}
				if (!preg_match('/^[a-z0-9]{5,10}$/', $login)) {
					$_ERROR[] = "Логин должен содержать только строчные латинские буквы и цифры, длиной от 5 до 10 символов.";
				}
			}

			// 2. Проверяем загрузку на наличие ошибок
			if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
				$errorCode = isset($_FILES['myfile']) ? $_FILES['myfile']['error'] : UPLOAD_ERR_NO_FILE;
				
				switch ($errorCode) {
					case UPLOAD_ERR_INI_SIZE:
					case UPLOAD_ERR_FORM_SIZE:
						$_ERROR[] = "Размер загружаемого файла превышает допустимый предел (300 Кб).";
						break;
					case UPLOAD_ERR_NO_FILE:
						$_ERROR[] = "Вы не выбрали файл для загрузки.";
						break;
					default:
						$_ERROR[] = "Произошла неизвестная ошибка при загрузке файла на сервер.";
						break;
				}
			}

			// 3. Если массив ошибок пуст, проверяем, относится ли файл к разрешенным для загрузки
			if (empty($_ERROR)) {
				$tmpPath = $_FILES['myfile']['tmp_name'];

				if (!function_exists('exif_imagetype')) {
					$_ERROR[] = "Внутренняя ошибка сервера: расширение EXIF не настроено.";
				} else {
					$imageType = exif_imagetype($tmpPath);

					if ($imageType === false) {
						$_ERROR[] = "Загруженный файл не является валидным изображением.";
					} else {
						$allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP];
						if (!in_array($imageType, $allowedTypes)) {
							$_ERROR[] = "Недопустимый формат изображения. Разрешены только JPEG, PNG и BMP.";
						}
					}
				}
			}
			
			// 4. Если массив ошибок пуст, пытаемся переместить файл в директорию upload
			if (empty($_ERROR)) {
				$uploadDir = 'upload/';
				
				// Автоматически создаем директорию upload, если её еще нет в проекте
				if (!is_dir($uploadDir)) {
					mkdir($uploadDir, 0755, true);
				}

				// Формируем безопасное имя файла на сервере
				$fileName = basename($_FILES['myfile']['name']);
				$destination = $uploadDir . $fileName;

				if (move_uploaded_file($_FILES['myfile']['tmp_name'], $destination)) {
					echo "<h3 style='color: green;'>🎉 Файл успешно загружен на сервер!</h3>";
					echo "<p><strong>Пользователь:</strong> " . htmlspecialchars($login) . "</p>";
					echo "<p><strong>Имя файла:</strong> " . htmlspecialchars($fileName) . "</p>";
					echo "<p><strong>Путь сохранения:</strong> " . htmlspecialchars($destination) . "</p>";
				} else {
					$_ERROR[] = "Не удалось переместить файл в целевую директорию. Проверьте права доступа.";
				}
			}

			// Вывод ошибок, если они возникли на любом из этапов
			if (!empty($_ERROR)) {
				echo "<h3 style='color: red;'>⚠️ Ошибки при обработке запроса:</h3>";
				echo "<ul>";
				foreach ($_ERROR as $error) {
					echo "<li>" . htmlspecialchars($error) . "</li>";
				}
				echo "</ul>";
				echo "<p><a href='javascript:history.back()'>Вернуться назад и исправить</a></p>";
			}

		} else {
			echo "<p>Ожидается отправка данных из формы файла index.html.</p>";
		}
	?>

</body>
</html>
