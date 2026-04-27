<?php
	// двумерный ассоциативный массив альбомов группы Pink Floyd
	$discography = [
		["id" => "1",
		"name" => "Atom Heart Mother",
		"date" => "10 октября 1970",
		"label" => "EMI, Harvest, Capitol",
		"format" => "LP, CD",
		"status" => "Золотой (USA)"
		],

		["id" => "2",
		"name" => "Meddle",
		"date" => "30 октября 1971",
		"label" => "EMI, Harvest, Capitol",
		"format" => "Vinyl, Кассета, CD",
		"status" => "Платиновый (USA)"
		],

		["id" => "3",
		"name" => "Obscured by Clouds",
		"date" => "3 июня 1972",
		"label" => "EMI, Harvest, Capitol",
		"format" => "LP, Кассета, CD",
		"status" => "Золотой (USA)", "Серебряный (GBR)"
		],

		["id" => "4",
		"name" => "The Dark Side of the Moon",
		"date" => "17 марта 1973",
		"label" => "Harvest, Capitol, EMI",
		"format" => "LP, Кассета, CD, SACD",
		"status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"
		],

		["id" => "5",
		"name" => "Wish You Were Here",
		"date" => "15 сентября 1975",
		"label" => "Harvest, EMI, Columbia, Capitol",
		"format" => "LP, 8-track, Кассета, CD, SACD",
		"status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
		],

		["id" => "6",
		"name" => "Animals",
		"date" => "23 января 1977",
		"label" => "Harvest, EMI Columbia, Capitol",
		"format" => "LP, 8-track, Кассета, CD",
		"status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
		],

		["id" => "7",
		"name" => "The Wall",
		"date" => "30 ноября 1979",
		"label" => "Harvest, EMI Columbia, Capitol",
		"format" => "LP, 8-track, Кассета, CD",
		"status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN), Платиновый (NLD)"
		],

		["id" => "8",
		"name" => "The Final Cut",
		"date" => "21 марта 1983",
		"label" => "Harvest, EMI Columbia, Capitol",
		"format" => "LP, 8-track, Кассета, CD",
		"status" => "Платиновый (USA), Золотой (GBR), Золотой(NLD)"
		],

		["id" => "9",
		"name" => "A Momentary Lapse of Reason",
		"date" => "8 сентября 1987",
		"label" => "EMI, Columbia",
		"format" => "LP, Кассета, CD",
		"status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN), Золотой(NLD)"
		],
		
		["id" => "10",
		"name" => "The Division Bell",
		"date" => "30 марта 1994",
		"label" => "EMI, Columbia",
		"format" => "LP, Кассета, CD",
		"status" => "Платиновый (USA), Платиновый (GBR), Платиновый (CAN), Платиновый(NLD)"
		]
	];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <h1>Двумерные масссивы</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Дата релиза</th>
                <th>Лейбл</th>
                <th>Формат</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($discography as $album): ?>
            <tr>
                <td><?= htmlspecialchars($album['id']) ?></td>
                <td><strong><?= htmlspecialchars($album['name']) ?></strong></td>
                <td><?= htmlspecialchars($album['date']) ?></td>
                <td><?= htmlspecialchars($album['label']) ?></td>
                <td><?= htmlspecialchars($album['format']) ?></td>
                <td><?= htmlspecialchars($album['status']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
