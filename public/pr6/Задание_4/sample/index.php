<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Функции</h1>
	<h2>Пользовательские функции</h2>
	
	<?php
		// подключаем функцию fnGetData()
		require 'function.php';	
		// получаем возвращаемый функцией массив
		$data = fnGetData();
		
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";

		// забираем данные по категории
		$person = $data["personnel"];
		$courses = $data["courses"];
		$educations = $data["educations"];
		
		function getPersonData($data) {
			// ...
			
		};
		
		function getPersonEdu($data) {
			// ...	
			
		};
		
		function getPersonCours($data) {
			// ...
			
		}
		
		// выводим персональные данные
		echo getPersonData($person);
		// выводим данные об образовании
		echo getPersonEdu($educations);
		// выводим данные о курсах
		echo getPersonCours($courses);
	?>
	

</body>
</html>