<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Функции</h1>
	<h2>Встроенные функции, часть 1</h2>
	
	<?php
		require "sample/teams.php";

		$tardet_id = $_GET['id'];

		if (empty($tardet_id)) {
			foreach ($content as $team) {
				foreach ($team as $key => $value) {
					echo  $key .': '. $value . '<br>' ;
				}
			} 
		} else {
			foreach ($content as $team) {
				if ($tardet_id == $team['id']) {
					foreach ($team as $key => $value) {
						echo  $key .': '. $value . '<br>' ;
					}
				}
			}
		}
	?>
	

</body>
</html>