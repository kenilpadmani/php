<?php

$randomNumber = rand(1, 6);
echo $randomNumber;
$randomNumber1 = rand(1,6);
echo "<br>";
$array =[];
for ($loopVariable = 0; $loopVariable < 11; $loopVariable++) {
    $array[$loopVariable] = $randomNumber1++;
}

foreach ($array as $arrayValue) {
    echo $arrayValue." ";
}



?>
<form action="Random.php" method="POST">
<input type="submit" name="rollDice" value=rollDice>
<input type="number" name="number" value="<?php echo $randomNumber; ?>" >
</form>