<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   
    include_once("educations.php");
    $jsonData = json_encode($educations, JSON_UNESCAPED_UNICODE);
    $urlEncodedData = urlencode($jsonData);
    $serverUrl = "server.php?data=" . $urlEncodedData;
    ?>
    <h1>Клиентская сторона</h1>
    <!-- 3. Передаем данные на условный сервер с помощью ссылки -->
    <a href="<?php echo $serverUrl; ?>" style="display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
        Передать данные об образовании на сервер
    </a>
</body>
</html>