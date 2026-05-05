<?php
$countstring = 6;
$aswer = ['беда','плохо','кажется что вы где то учились','вы среднестатистический человек','нормально','хорошо','отлично'];

if ($countstring != 0) {
    $countstring = $countstring/2 - 1;
    echo $aswer[$countstring] ;
}
?>