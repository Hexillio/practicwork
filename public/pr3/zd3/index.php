<?php
$user = [
    'фамилия'=> ' Лаврецкая',
    'имя'=>' Елизавета',
    'отчество'=>' Викторовна',
    'логин'=>' elizaveta',
    'пароль'=> ' 12345',
    'почта'=>' lovel@mail.ru',
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
    <b><h1>Вы успешно зарегестрировались! </h1></b>
    <?php
    
    echo '<b><h2>' . $user['фамилия'], $user['имя'], $user['отчество'] .'</h2></b>';
    echo 'логин:' . $user['логин'] . '<br>пароль:' . $user['пароль'] . '<br>почта:' . $user['почта'];

    ?>
</body>
</html>