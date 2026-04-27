<?php
$user = [
    'Иванов',
    'Иван',
    'Иванович',
    '15.05.1985',
    'учитель математики',
    'высшая',
    'высшее(магистратура)',
    'мгу им. Ломоносова',
    'математик, преподаватель',
    'математика и информатика',
    '5 лет',
    '12 лет',
    'ivanov_i@example.com',
]
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
    var_dump($user);
    echo "</pre>"
    ?>
</body>
</html>