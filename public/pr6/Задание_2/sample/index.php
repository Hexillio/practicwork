<?php

require("album.php");

function fnOutAlbum($arr) {
    echo '<table border="1">
    <tr>
    <th>id</th>
    <th>title</th>
    <th>date</th>
    <th>country</th>
    <th>id_team</th>
    </tr>';

    foreach ($arr as $value) {

    echo '<tr>';

        foreach ($value as $k => $v) {

        echo "
        <td>$v</td>
        ";

        }

    echo '</tr>';

    }



}

fnOutAlbum($album)

?>