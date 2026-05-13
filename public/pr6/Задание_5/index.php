<?php

require "function.php" ;
$data = fnGetData();

$person = $data["personnel"];
$courses = $data["courses"];
$educations = $data["educations"];

$id = $_GET["id"];

function getPersonData($data, $id=1) {

    foreach ($data as $value) {

        if ($value["id_personnel"] == $id) {
            
            echo "<h1>" . $value['surname'] . " " . $value['name'] . " " . $value['patronymic'] . " " . "</h1>";
	        echo "<h3>Категории: ". $value["category"] . "</h3>";
        
        }
    }
};

function getPersonEdu($data, $id=1) {
            echo 
			'<table border="1">
			<tr>
			<th>обучение</th>
			<th>институт</th>
			<th>квалификация</th>
			<th>специализация</th>
			</tr>';
    foreach ($data as $value) {

        if ($value["id_personnel"] == $id) {
            
            

			echo '<tr>';
			echo '<td>'. $value['year_receipts'] . '-' . $value['year_release'] . '</td>';
			echo '<td>'. $value['institution'] . '</td>';
			echo '<td>'. $value['qualification'] . '</td>';
			echo '<td>'. $value['specialty'] . '</td>';
			echo '</tr>';
			
        }
    }

    echo '<br></table>';
};

function getPersonCours($data, $id=1) {
        echo 
			'<table border="1">
			<tr>
			<th>наименование</th>
			<th>продолжительность</th>
			<th>цена</th>
			</tr>';

    foreach ($data as $value) {

        if ($value["id_personnel"] == $id) {
			echo '<tr>';
			echo '<td>'. $value['name'] . '</td>';
			echo '<td>'. $value['duration'] . '</td>';
			echo '<td>'. $value['price'] . '</td>';
			echo '</tr>';

        }
    }
        echo '<br></table>';
};

if (isset(($id))){

getPersonData($person, $id);
getPersonEdu($educations, $id);
getPersonCours($courses, $id);

} else {

getPersonData($person);
getPersonEdu($educations);
getPersonCours($courses);

};

?>