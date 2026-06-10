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
			$login =htmlspecialchars(trim($_POST['login']));
	        
	        // проверяем данные на валидность
	        if (!preg_match('/^[a-z0-9]{5,10}$/u', $login)) {
				$_ERROR[] = "Логин $login невалиден";
	        } 
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// проверяем загрузку на наличие ошибок
		if ($_FILES['myfile']["error"] != UPLOAD_ERR_OK) {
		   // если при загрузке произошла ошибка, запомним информацию о ней
			switch ($_FILES['myfile']['error']) {
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
			}
		} 

		// если массив ошибок пуст проверяем, относится ли файл к разрешенным для загрузки
		if (empty($_ERROR)){
			// разрешенные форматы графических файлов для загрузки
			define ('ALLOW_IMAGE_EXT', array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP));

			// проверка, действительно ли отправляемый файл относится к разрешенным типам
			if (!in_array(exif_imagetype($_FILES["myfile"]["tmp_name"]), ALLOW_IMAGE_EXT)) {
				$_ERROR[] = "Загружаемый файл не относится к разрешенным типам";
			}			
		}
		
		// если массив ошибок пуст пытаемся переместить файл в директорию upload
		if (empty($_ERROR)) {
			
			// текущее расположение файла
			$current_path = $_FILES['myfile']['tmp_name'];

			// оригинальное имя файла
			$filename = $_FILES['myfile']['name'];

			// место постоянного хранения файла
			$new_path = __DIR__ . '/upload/' . $filename;				

			// перемещение загруженного файла 
			if (move_uploaded_file($current_path, $new_path)) {

				// выводим сообщение об успешной загрузке файла изображения
				$result = "<h3>Файл изображения успешно загружен на сервер</h3>";
				// выводим изображение аватарки
				$result .= "<img src='upload/" . $filename . "' width='250px'>";

			} else {
				// если во время перемещения возникла ошибка
				$result = "<h3>Не удалось переместить файл в директорию хранения</h3>";
			}	

			// выводим результат перемещения файла в директорию upload
			echo $result;

		} else {

			// вывводим массив ошибок
			echo "<pre>";
			print_r($_ERROR);
		}
	?>


</body>
</html>