<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('sample/dump/albums.php');
include('sample/dump/tracks.php');

foreach ($albums as $album) {
    echo "<h3>" . $album['id_album'] . ". " . $album['title'] . " (" . $album['country'] . ")</h3>";
    
    echo "<ul>";
    foreach ($tracks as $track) {
        if ($album['id_album'] == $track['id_album']) {
            echo "<li>" . $track['name'] . "</li>"; 
        }
    }
    echo "</ul>";
}
?>

</body>
</html>