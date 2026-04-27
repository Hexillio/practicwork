<?php
$discography = [
    [
        "id" => 1,
        "name" => "Atom Heart Mother",
        "date" => [
            "day" => 10,
            "month" => "октября",
            "year" => 1970
        ],
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["LP", "CD"],
        "status" => [
            "USA" => "Золотой"
        ]
    ],
    [
        "id" => 2,
        "name" => "Meddle",
        "date" => [
            "day" => 30,
            "month" => "октября",
            "year" => 1971
        ],
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["Vinyl", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый"
        ]
    ],
    [
        "id" => 3,
        "name" => "Obscured by Clouds",
        "date" => [
            "day" => 3,
            "month" => "июня",
            "year" => 1972
        ],
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            "USA" => "Золотой",
            "GBR" => "Серебряный"
        ]
    ],
    [
        "id" => 4,
        "name" => "The Dark Side of the Moon",
        "date" => [
            "day" => 17,
            "month" => "марта",
            "year" => 1973
        ],
        "label" => ["Harvest", "Capitol", "EMI"],
        "format" => ["LP", "Кассета", "CD", "SACD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Платиновый",
            "CAN" => "Бриллиантовый"
        ]
    ],
    [
        "id" => 5,
        "name" => "Wish You Were Here",
        "date" => [
            "day" => 15,
            "month" => "сентября",
            "year" => 1975
        ],
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD", "SACD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "CAN" => "Платиновый"
        ]
    ],
    [
        "id" => 6,
        "name" => "Animals",
        "date" => [
            "day" => 23,
            "month" => "января",
            "year" => 1977
        ],
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "CAN" => "Платиновый"
        ]
    ],
    [
        "id" => 7,
        "name" => "The Wall",
        "date" => [
            "day" => 30,
            "month" => "ноября",
            "year" => 1979
        ],
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Платиновый",
            "CAN" => "Бриллиантовый",
            "NLD" => "Платиновый"
        ]
    ],
    [
        "id" => 8,
        "name" => "The Final Cut",
        "date" => [
            "day" => 21,
            "month" => "марта",
            "year" => 1983
        ],
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "NLD" => "Золотой"
        ]
    ],
    [
        "id" => 9,
        "name" => "A Momentary Lapse of Reason",
        "date" => [
            "day" => 8,
            "month" => "сентября",
            "year" => 1987
        ],
        "label" => ["EMI", "Columbia"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "CAN" => "Платиновый",
            "NLD" => "Золотой"
        ]
    ],
    [
        "id" => 10,
        "name" => "The Division Bell",
        "date" => [
            "day" => 30,
            "month" => "марта",
            "year" => 1994
        ],
        "label" => ["EMI", "Columbia"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Платиновый",
            "CAN" => "Платиновый",
            "NLD" => "Платиновый"
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
echo "<pre>";
print_r($discography);
echo "</pre>";
?>
</body>
</html>


