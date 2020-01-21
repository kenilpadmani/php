<?php

$food = array("pizza", "dhosa", "vadapav", "panjabi");
/*$food_length = strlen$food);
for($item = 0; $item < $food_length; $item++) {
    echo $food[$item]."<br>";
}*/

foreach($food as $food_item) {
    echo $food_item."<br>";
}

$array = array(
    "foo" => "bar",
    "bar" => "foo"
);
echo "Key and value pair array : ";
foreach($array as $arrayItem) {
    echo $arrayItem." ";
}
echo "<br>";

$array = array(
    3    => "a",
    "1"  => "b",
    2  => "c",
    true => "d"
);
var_dump($array);
echo "different type of key and same type of value in array : ";
foreach($array as $arrayItem) {
    echo $arrayItem." ";
}
echo "<br>";

$array = array(
    "foo" => "bar",
    "bar" => "foo",
    "100" => 100,
    -100  => 100,
);
var_dump($array);
foreach($array as $arrayItem) {
    echo $arrayItem." ";
}
echo "<br>";


$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);
foreach($array as $arrayItem) {
    echo $arrayItem." ";
}
echo "<br>";

//MultiDimensial Array
$food = array("Helthy" => 
                        array("banna", "apple", "mengo"),
             "Unhelthy" => 
                        array("pizza", "pakodi", "sandwich")
            );
foreach($food as $food_item => $foodInnerItem) {
    echo "<strong>".$food_item."</strong><br>";
    foreach($foodInnerItem as  $foodInnerItemValue) {
        echo $foodInnerItemValue."<br>";
    }
}
echo "<br>";

echo "Multidimensial Array with key and value : ";
$food = array("Helthy" => 
                        array(
                            "b" => "banna", 
                            "a" => "apple",
                            "m" => "mengo"
                        ),
             "Unhelthy" => 
                        array(
                            "pi"  => "pizza", 
                            "pa" => "pakodi", 
                            "sa" => "sandwich"
                        )
            );
foreach($food as $food_item => $foodInnerItem) {
    echo "<strong>".$food_item."</strong><br>";
    foreach($foodInnerItem as  $foodInnerItemKey => $foodInnerItemValue) {
        echo $foodInnerItemKey."=>".$foodInnerItemValue."<br>";
    }
}




?>