<?php


//For loop
for($counter = 0; $counter < 10; $counter++) {
    echo $counter;
}

$color = ["red","green","blue"];

//foreach loop
foreach($color as $color_values) {
    echo "<br>".$color_values."<br>";
}

//While loop
$counter = 10;
while($counter < 20) {
    echo $counter."<br>";
    $counter++;
}

//Do_while loop
$counter = 20;
do{
    echo $counter."<br>";
    $counter++;
}while($counter < 30);

$i = 1;
do{
    $i++;
    echo "The number is " . $i . "<br>";
}
while($i <= 3);

?>