<?php
$albums = [
    "album_1" => [
        "id" => 1,
        "title" => "Atom Heart Mother",
        "release_date" => "10 октября 1970",
        "label" => "EMI, Harvest, Capitol",
        "format" => "LP, CD",
        "status" => "Золотой (USA)"
    ],
    "album_2" => [
        "id" => 2,
        "title" => "Meddle",
        "release_date" => "30 октября 1971",
        "label" => "EMI, Harvest, Capitol",
        "format" => "Vinyl, Кассета, CD",
        "status" => "Платиновый (USA)"
    ],
    "album_3" => [
        "id" => 3,
        "title" => "Obscured by Clouds",
        "release_date" => "3 июня 1972",
        "label" => "EMI, Harvest, Capitol",
        "format" => "LP, Кассета, CD",
        "status" => "Золотой (USA), Серебряный (GBR)"
    ],
    "album_4" => [
        "id" => 4,
        "title" => "The Dark Side of the Moon",
        "release_date" => "17 марта 1973",
        "label" => "Harvest, Capitol, EMI",
        "format" => "LP, Кассета, CD, SACD",
        "status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"
    ],
    "album_5" => [
        "id" => 5,
        "title" => "Wish You Were Here",
        "release_date" => "15 сентября 1975",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Кассета, CD, SACD",
        "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
    ],
    "album_6" => [
        "id" => 6,
        "title" => "Animals",
        "release_date" => "23 января 1977",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Кассета, CD",
        "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
    ],
    "album_7" => [
        "id" => 7,
        "title" => "The Wall",
        "release_date" => "30 ноября 1979",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Кассета, CD",
        "status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN), Платиновый (NLD)"
    ],
    "album_8" => [
        "id" => 8,
        "title" => "The Final Cut",
        "release_date" => "21 марта 1983",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Кассета, CD",
        "status" => "Платиновый (USA), Золотой (GBR), Золотой (NLD)"
    ],
    "album_9" => [
        "id" => 9,
        "title" => "A Momentary Lapse of Reason",
        "release_date" => "8 сентября 1987",
        "label" => "EMI, Columbia",
        "format" => "LP, Кассета, CD",
        "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
    ],
    "album_10" => [
        "id" => 10,
        "title" => "The Division Bell",
        "release_date" => "30 марта 1994",
        "label" => "EMI, Columbia",
        "format" => "LP, Кассета, CD",
        "status" => "Платиновый (USA), Платиновый (GBR), Платиновый (CAN), Платиновый (NLD)"
    ]
];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
    <?php
    echo "<pre>";
   var_dump($albums);
    echo "</pre>"
    ?>
</body>
</html>