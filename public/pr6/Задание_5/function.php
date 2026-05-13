<?php
	// функция получения данных
	// в реальном приложении данные будут получаться из баз данных
	// сейчас это не принципиально 
	function fnGetData () {
		// подключаем файлы, получаем данные
		require 'sample/dump/personnel.php';
		require 'sample/dump/courses.php';
		require 'sample/dump/educations.php';
		// теперь внутри функции доступны МАССИВЫ
		// - $personnel
		// - $courses
		// - $educations 
		
		// данные получили, можно их упаковать в ассоциативный массив и
		// отдать во внешнее приложение
		return $data = array(
			'personnel' => $personnel,
			'courses' => $courses,
			'educations' => $educations
		);
	}