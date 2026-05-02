<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require('sample/dump/albums.php');
    require('sample/dump/tracks.php');

    $tardet_id = $_GET['id'];

    if ($tardet_id != '') {
    foreach ($albums as $album) {
        if ($album['id_album'] == $tardet_id) {

            echo '<h2>' . $album['title'] .' ('. $album['country'] . ') </h2>';
            echo '<ul>';
            foreach ($tracks as $track) {
                if ($track['id_album'] == $album['id_album'] ){
                    echo '<li>'.$track['name'] . '</li>';
                }
            }
            echo '</ul>';
        }
    }
    } else{
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
    }
    ?>
</body>
</html>