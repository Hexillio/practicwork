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
		echo "<h1>" . $data['surname'] . " " . $data['name'] . " " . $data['patronymic'] . " " . "</h1>";
		echo "<h3>Категории: ". $data["category"] . "</h3>";
		};
		
		function getPersonEdu($data) {
			echo 
			'<table border="1">
			<tr>
			<th>обучение</th>
			<th>институт</th>
			<th>квалификация</th>
			<th>специализация</th>
			</tr>';

			foreach ($data as $value) {
			echo '<tr>';
			echo '<td>'. $value['year_receipts'] . '-' . $value['year_release'] . '</td>';
			echo '<td>'. $value['institution'] . '</td>';
			echo '<td>'. $value['qualification'] . '</td>';
			echo '<td>'. $value['specialty'] . '</td>';
			echo '</tr>';
			}

			echo '</table>';
			
		};
		
		function getPersonCours($data) {
			echo 
			'<table border="1">
			<tr>
			<th>наименование</th>
			<th>продолжительность</th>
			<th>цена</th>
			</tr>';

			foreach ($data as $value) {
			echo '<tr>';
			echo '<td>'. $value['name'] . '</td>';
			echo '<td>'. $value['duration'] . '</td>';
			echo '<td>'. $value['price'] . '</td>';
			echo '</tr>';
			}

			echo '</table>';
			
			
		}
		
		// выводим персональные данные
		echo getPersonData($person);
		// выводим данные об образовании
		echo '<p>образование</p>';
		echo getPersonEdu($educations);
		// выводим данные о курсах
		echo '<p>Курсы</p>';
		echo getPersonCours($courses);
	?>
	

</body>
</html>