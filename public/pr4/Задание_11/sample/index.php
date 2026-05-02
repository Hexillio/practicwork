<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Управляющие конструкции</h1>
	<h2>Конструкции</h2>
	
	<?php
	include("personnels.php");
		// критерий поиска
		$term = "surname";
		$value = "Маркова";
		
		// ...

		foreach ($content as $item) {
			if ($item[$term] == $value) {
				echo "
				id: ". $item['id_personnel']." <br />  
				Фамилия:". $item['surname'] . " <br />  
				Имя: " . $item['name'] . " <br />  
				Отчество: " . $item['patronymic'] . "<br />
				Должность: " . $item['post'] . " <br />  
				Категория:" . $item['category'] . " <br /> 
				Образование: " . $item['level_edu'] . " <br /> 
				Стаж работы в ОУ: " . $item['experience_total ']; 
			}
		}
	?>
	

</body>
</html>