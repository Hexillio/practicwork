<?php

require("track.php");

function fnOutAlbum($arr, $id) {
    echo '<table border="1">
    <tr>
    <th>id track</th>
    <th>name</th>
    <th>note</th>
    <th>album</th>
    </tr>';

    foreach ($arr as $value) {
        
        if ($value['id_track'] == $id) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($value['id_track']) . '</td>';
            echo '<td>' . htmlspecialchars($value['name']) . '</td>';
            echo '<td>' . htmlspecialchars($value['note']) . '</td>';
            echo '<td>' . htmlspecialchars($value['id_album']) . '</td>';
            echo '</tr>';
        }
    }

    echo '</table>'; 
}

fnOutAlbum($track, '3');

?>
