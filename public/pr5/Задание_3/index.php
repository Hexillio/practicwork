<?php
$count = 5; 

$diceValues = [];
$totalSum = 0;

for ($i = 0; $i < $count; $i++) {
    $randomValue = mt_rand(1, 6); 
    $diceValues[] = $randomValue; 
    $totalSum += $randomValue;    
}

echo "<h2>Результат броска:</h2>";
echo "<div style='display: flex; gap: 10px;'>";

foreach ($diceValues as $value) {
    echo "<img src='{$value}.jpg' alt='Кубик {$value}' width='100'>";
}

echo "</div>";

echo "<h3>Сумма очков: " . $totalSum . "</h3>";
?>
