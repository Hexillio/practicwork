<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 1</h2>
	
	<?php

		// Включаем отображение ошибок для отладки
		ini_set('display_errors', 1);
		error_reporting(E_ALL);

		// Массив для сбора ошибок
		$errors = [];

		// Проверяем, что форма была отправлена методом POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			// 1. ПРОВЕРКА НА ПУСТОТУ
			// Получаем данные и обрезаем пробелы по краям. Если поля нет в POST, ставим пустую строку.
			$login = isset($_POST['login']) ? trim($_POST['login']) : '';
			$email = isset($_POST['email']) ? trim($_POST['email']) : '';
			$pwd   = isset($_POST['pwd'])   ? trim($_POST['pwd']) : '';

			if ($login === '') {
				$errors[] = "Поле 'Логин' не должно быть пустым.";
			}
			if ($email === '') {
				$errors[] = "Поле 'E-mail' не должно быть пустым.";
			}
			if ($pwd === '') {
				$errors[] = "Поле 'Пароль' не должно быть пустым.";
			}

			// 2. САНИТИЗАЦИЯ И ВАЛИДАЦИЯ (выполняются, только если поля не пустые)
			if (empty($errors)) {
				
				// --- Логин ---
				// Санитизация: удаляем HTML-теги и лишние символы
				$login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
				// Валидация: например, логин должен состоять только из букв и цифр, от 3 до 20 символов
				if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $login)) {
					$errors[] = "Логин должен содержать от 3 до 20 символов (латиница, цифры или знак подчеркивания).";
				}

				// --- E-mail ---
				// Санитизация: удаляем запрещенные в email символы
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);
				// Валидация: проверка на соответствие формату адреса электронной почты
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$errors[] = "Указан некорректный адрес E-mail.";
				}

				// --- Пароль ---
				// Санитизация: для паролей санитизация строк не рекомендуется (чтобы не портить спецсимволы),
				// но экранируем сущности для безопасного вывода, если это потребуется.
				$pwd_safe = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
				// Валидация: минимальная длина пароля (например, не менее 6 символов)
				if (mb_strlen($pwd) < 6) {
					$errors[] = "Пароль должен быть не менее 6 символов.";
				}
			}

			// ИТОГОВЫЙ ВЫВОД РЕЗУЛЬТАТА
			echo "<!DOCTYPE html>";
			echo "<html lang='ru'>";
			echo "<head><meta charset='UTF-8'><title>Результат обработки</title></head>";
			echo "<body>";

			if (empty($errors)) {
				// Если массив ошибок пуст — всё прошло успешно
				echo "<h2>Данные успешно отправлены и прошли проверку!</h2>";
				echo "<p><strong>Ваш логин:</strong> " . htmlspecialchars($login) . "</p>";
				echo "<p><strong>Ваш E-mail:</strong> " . htmlspecialchars($email) . "</p>";
			} else {
				// Если есть ошибки — выводим их списком
				echo "<h2 style='color: red;'>При обработке формы возникли проблемы:</h2>";
				echo "<ul>";
				foreach ($errors as $error) {
					echo "<li>" . htmlspecialchars($error) . "</li>";
				}
				echo "</ul>";
				echo "<p><a href='javascript:history.back()'>Вернуться назад и исправить</a></p>";
			}

			echo "</body>";
			echo "</html>";

		} else {
			// Если файл открыт напрямую, а не через POST-запрос
			echo "Форма не была отправлена.";
		}
		?>

	
	

</body>
</html>