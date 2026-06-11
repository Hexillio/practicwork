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
		$_ERROR = [];

		// если поле логина непустое
		if (!empty($_POST['login'])) {
			
			// очищаем данные 	
			$login = htmlspecialchars(trim($_POST['login']));
	        
	        // проверяем данные на валидность
	        if (!preg_match('/^[a-z0-9]{5,10}$/u', $login)) {
				$_ERROR[] = "Логин $login невалиден";
	        } 
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// проверяем загрузку на наличие ошибок
		if (!isset($_FILES['myfile']) || $_FILES['myfile']["error"] != UPLOAD_ERR_OK) {
		   // если при загрузке произошла ошибка, запомним информацию о ней
			$error_code = isset($_FILES['myfile']) ? $_FILES['myfile']['error'] : UPLOAD_ERR_NO_FILE;
			switch ($error_code) {
		        case UPLOAD_ERR_INI_SIZE:
		            $_ERROR[] = "Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini (код ошибки: 1)";
					break;
		        case UPLOAD_ERR_FORM_SIZE:
		        	$_ERROR[] = "Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме (код ошибки: 2)";
					break;
		        case UPLOAD_ERR_PARTIAL:
		            $_ERROR[] = "Загружаемый файл был получен только частично (код ошибки: 3)";
					break;
		        case UPLOAD_ERR_NO_FILE:
		        	$_ERROR[] = "Файл не был загружен (код ошибки: 4)";
					break;
				default:
					$_ERROR[] = "Произошла неизвестная ошибка при загрузке (код ошибки: $error_code)";
			}
		} 

		// если массив ошибок пуст проверяем, относится ли файл к разрешенным для загрузки
		if (empty($_ERROR)){
			// Разрешенные MIME-типы для загрузки
			define ('ALLOW_MIME_TYPES', array('image/jpeg', 'application/pdf', 'application/zip'));

			// Безопасное определение реального MIME-типа файла по его сигнатуре (содержимому)
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			$file_mime = $finfo->file($_FILES["myfile"]["tmp_name"]);

			// Проверка на соответствие разрешенным типам
			if (!in_array($file_mime, ALLOW_MIME_TYPES)) {
				$_ERROR[] = "Загружаемый файл имеет недопустимый тип ($file_mime). Разрешены только JPEG, PDF и ZIP.";
			}			
		}
		
		// если массив ошибок пуст пытаемся переместить файл в директорию upload
		if (empty($_ERROR)) {
			
			// текущее расположение файла
			$current_path = $_FILES['myfile']['tmp_name'];

			// оригинальное имя файла
			$filename = $_FILES['myfile']['name'];

			// Папка для загрузки
			$upload_dir = __DIR__ . '/upload/';

			// Создаем директорию, если её нет
			if (!is_dir($upload_dir)) {
				mkdir($upload_dir, 0755, true);
			}

			// место постоянного хранения файла
			$new_path = $upload_dir . basename($filename);				

			// перемещение загруженного файла 
			if (move_uploaded_file($current_path, $new_path)) {

				// Выводим универсальное сообщение об успешной загрузке
				$result = "<h3>Файл успешно загружен на сервер!</h3>";
				$result .= "<p>Пользователь: <strong>" . htmlspecialchars($login) . "</strong></p>";
				$result .= "<p>Имя файла: <code>" . htmlspecialchars($filename) . "</code></p>";
				$result .= "<p>Определенный тип: <code>" . htmlspecialchars($file_mime) . "</code></p>";

				// Если загружен именно JPEG-рисунок, выводим его превью
				if ($file_mime === 'image/jpeg') {
					$result .= "<br><img src='upload/" . htmlspecialchars($filename) . "' width='250px' alt='Аватар'>";
				}

			} else {
				// если во время перемещения возникла ошибка
				$result = "<h3>Не удалось переместить файл в директорию хранения. Проверьте права на папку upload/.</h3>";
			}	

			// выводим результат перемещения файла в директорию upload
			echo $result;

		} else {

			// выводим массив ошибок
			echo "<h3 style='color: red;'>При загрузке возникли ошибки:</h3>";
			echo "<pre>";
			print_r($_ERROR);
			echo "</pre>";
			echo "<p><a href='javascript:history.back()'>Вернуться назад</a></p>";
		}
	?>

</body>
</html>
